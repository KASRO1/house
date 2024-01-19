<?php

namespace App\Http\Controllers;

use App\Classes\CourseFunction;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\StakingOrder;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\CoinFunction;
use Illuminate\Support\Facades\Validator;
use function Illuminate\Events\queueable;

class BalanceController extends Controller
{
    public function swapToSpot(Request $request): \Illuminate\Http\JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'amountFrom' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'amountTo' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbolFrom' => 'required|string|min:1',
            'CoinSymbolTo' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coinInfoFrom = Coin::where('symbol', $request->CoinSymbolFrom)->first();
        $coinInfoTo = Coin::where('symbol', $request->CoinSymbolTo)->first();

        $Balance = Balance::where("coin_id", $coinInfoFrom['id_coin'])->first();
        if (!$Balance) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }
        $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
        $AmountToUsd = $courseFunction - getBalanceCoinToEquivalentUsd($coinInfoTo['id_coin'], $request->amountTo);
        $AmountFromUsd = $courseFunction - getBalanceCoinToEquivalentUsd($coinInfoFrom['id_coin'], $request->amountFrom);
        if ($BalanceUSD < $AmountFromUsd) {
            return response()->json(['errors' => ["amountFrom" => ["Insufficient funds"]]], 401);
        }

        $coinFunction->addBalanceCoin($coinInfoTo['id_coin'], $request->amountTo);
        $coinFunction->removeBalanceCoin($coinInfoFrom['id_coin'], $request->amountFrom);
        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfoFrom['simple_name'];
        $transaction->amount = $AmountFromUsd;
        $transaction->type = "SwapToSpot";
        $transaction->status = "Completed";
        $transaction->user_id = $request->user()->id;
        $transaction->save();
        return response()->json(['message' => 'Swap successfully'], 201);
    }

    public function swapBalanceCoin(Request $request): \Illuminate\Http\JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'AmountFrom' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.0000001',
            'amountTo' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.0000001',
            'CoinSymbolFrom' => 'required|string|min:1',
            'CoinSymbolTo' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        if ($request->CoinSymbolFrom === $request->CoinSymbolTo) {
            return response()->json(['errors' => ["CoinSymbolFrom" => ["Coins must be different"]]], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coinInfoFrom = Coin::where('simple_name', $request->CoinSymbolFrom)->first();
        $coinInfoTo = Coin::where('simple_name', $request->CoinSymbolTo)->first();

        $Balance = Balance::where("coin_id", $coinInfoFrom['id_coin'])->first();

        if ($Balance['quantity'] < $request->AmountFrom) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }

        $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
        $convert = $courseFunction->convertCryptoPrice($request->AmountFrom, $request->CoinSymbolFrom, $request->CoinSymbolTo);
        $AmountToUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfoTo['id_coin'], $request->amountTo);
        $AmountFromUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfoFrom['id_coin'], $request->amountFrom);
        if ($BalanceUSD < $AmountFromUsd) {
            return response()->json(['errors' => ["amountFrom" => ["Insufficient funds"]]], 401);
        }

        $coinFunction->addBalanceCoin($coinInfoTo['id_coin'], $convert, "standard");
        $coinFunction->removeBalanceCoin($coinInfoFrom['id_coin'], $request->AmountFrom, "standard");
        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfoFrom['simple_name'];
        $transaction->amount = $request->AmountFrom;
        $transaction->type = "Swap";
        $transaction->status = "Completed";
        $transaction->user_id = $request->user()->id;
        $transaction->save();
        return response()->json(['message' => 'Swap successfully'], 201);
    }


    public function TransferToSpot(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbol' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

        $Balance = Balance::where("coin_id", $coinInfo['id_coin'])->where("user_id", $user['id'])->first();
        if (!$Balance) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }
        $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
        $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
        if ($BalanceUSD < $AmountUsd) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }

        $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
        $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfo['simple_name'];
        $transaction->amount = $request->amount;
        $transaction->type = "TransferToSpot";
        $transaction->status = "Completed";
        $transaction->user_id = $request->user()->id;
        $transaction->save();
        return response()->json(['message' => 'Transfer successfully'], 201);
    }

    function TransferSpotToBalance(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbol' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

        $Balance = $coinFunction->getBalanceCoinSpot($coinInfo['id_coin']);
        if (!$Balance) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }
        $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
        $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
        if ($BalanceUSD < $AmountUsd) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }

        $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
        $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfo['simple_name'];
        $transaction->amount = $request->amount;
        $transaction->type = "TransferSpotToBalance";
        $transaction->status = "Completed";
        $transaction->user_id = $request->user()->id;
        $transaction->save();
        return response()->json(['message' => 'Transfer successfully'], 201);
    }

    function TransferToUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbol' => 'required|string|min:1',
            'email' => 'required|string|min:1|exists:users,email',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();


        $user = User::where('id', $request->user()->id)->first();
        if ($user['email'] === $request->email) {
            return response()->json(['errors' => ["email" => ["You can't transfer to yourself"]]], 401);
        }
        $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();
        $UserSend = User::where('email', $request->email)->first();

        $Balance = $coinFunction->getBalanceCoin($coinInfo['id_coin']);
        if (!$Balance) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }
        $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
        $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
        if ($BalanceUSD < $AmountUsd) {
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }

        $coinFunction->addBalanceCoinUserID($UserSend['id'], $coinInfo['id_coin'], $request->amount, "standard");
        $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");

        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfo['simple_name'];
        $transaction->user_id = $UserSend['id'];
        $transaction->amount = $request->amount;
        $transaction->type = "TransferToUser";
        $transaction->status = "Completed";
        $transaction->save();
        $transaction = new Transaction();
        $transaction->coinSymbol = $coinInfo['simple_name'];
        $transaction->user_id = $request->user()->id;
        $transaction->amount = $request->amount;
        $transaction->type = "TransferToUser";
        $transaction->status = "Completed";
        $transaction->save();
        return response()->json(['message' => 'Transfer successfully'], 201);


    }

    public function getBalanceCoin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CoinSymbol' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

        $Balance = $coinFunction->getBalanceCoin($coinInfo['id_coin']);
        if ($Balance) {
            $Balance = $Balance['quantity'];
        } else {
            $Balance = 0;
        }

        return response()->json(['balance' => $Balance], 201);
    }

    public function getBalanceCoinSpot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'CoinSymbol' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

        $Balance = $coinFunction->getBalanceCoinSpot($coinInfo['id_coin']);
        if ($Balance) {
            $Balance = $Balance['quantity'];
        } else {
            $Balance = 0;
        }

        return response()->json(['balance' => $Balance], 201);
    }

    public function convertCryptoPrice(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0.000000001',
            'CoinSymbolFrom' => 'required|string|min:1',
            'CoinSymbolTo' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        if ($request->CoinSymbolFrom === $request->CoinSymbolTo) {
            return response()->json(['errors' => ["CoinSymbolFrom" => ["Coins must be different"]]], 401);
        }
        $courseFunction = new CourseFunction();
        $price = $courseFunction->convertCryptoPrice($request->amount, $request->CoinSymbolFrom, $request->CoinSymbolTo);


        return response()->json(['price' => $price], 201);

    }

    public function createStackingOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbol' => 'required|string|min:1',
            'stacking' => 'required|int|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coin = Coin::where('simple_name', $request->CoinSymbol)->first();
        $balance = $coinFunction->getBalanceCoin($coin['id_coin']);
        if(!$balance || $balance['quantity'] < $request->amount){
            return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
        }

        if(!$coin['staking_percent']){
            $percent = ["7" => 0.1169, "14" => 0.2338, "30" => 0.501, "60" => 1.002, "90" => 1.503, "180" =>  2.004, "365" => 6];
        }
        else{
            $percent = json_decode($coin['staking_percent'], true);
        }

        $percent = $percent[$request->stacking];
        $amount = $request->amount;

        $amount = $amount * $percent;
        $amount = $request->amount + ( $amount * $percent);

        $coinFunction->removeBalanceCoin($coin['id_coin'], $request->amount, "standard");


        $StakingOrder = new StakingOrder();
        $StakingOrder->user_id = $request->user()->id;
        $StakingOrder->coin_id = $coin['id_coin'];
        $StakingOrder->coin_symbol = $coin['simple_name'];
        $StakingOrder->days = $request->stacking;
        $StakingOrder->percent = $percent;
        $StakingOrder->amount = $request->amount;
        $StakingOrder->final_amount = $amount;
        $StakingOrder->save();

        $Transaction = new Transaction();
        $Transaction->user_id = $request->user()->id;
        $Transaction->coinSymbol = $coin['simple_name'];
        $Transaction->amount = $amount;
        $Transaction->type = "Stacking";
        $Transaction->status = "In process";
        $Transaction->save();

        return response()->json(['message' => 'Stacking successfully'], 201);
    }

    public function getStackingSumm(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
            'CoinSymbol' => 'required|string|min:1',
            'stacking' => 'required|int|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $user = User::where('id', $request->user()->id)->first();
        $coin = Coin::where('simple_name', $request->CoinSymbol)->first();

        if(!$coin['staking_percent']){

            $percent = ["7" => 0.1169, "14" => 0.2338, "30" => 0.501, "60" => 1.002, "90" => 1.503, "180" =>  2.004, "365" => 6];
        }
        else{
            $percent = json_decode($coin['staking_percent'], true);
        }

        $percent = $percent[$request->stacking];

        $amount = $request->amount;
        $amount = $request->amount + ( $amount * $percent);


        return response()->json(['amount' => $amount], 201);
    }

}
