<?php

namespace App\Http\Controllers;

use App\Classes\CourseFunction;
use App\Models\Balance;
use App\Models\Coin;
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
            if(!$Balance) {
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
            $AmountToUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfoTo['id_coin'], $request->amountTo);
            $AmountFromUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfoFrom['id_coin'], $request->amountFrom);
            if($BalanceUSD < $AmountFromUsd){
                return response()->json(['errors' => ["amountFrom" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfoTo['id_coin'], $request->amountTo);
            $coinFunction->removeBalanceCoin($coinInfoFrom['id_coin'], $request->amountFrom);
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfoFrom['simple_name'];
            $transaction->Amount = $AmountFromUsd;
            $transaction->Type = "SwapToSpot";
            $transaction->Status = "Success";
            $transaction->user_id = $request->user()->id;
            $transaction->save();
            return  response()->json(['message' => 'Swap successfully'], 201);
        }

        public function swapBalanceCoin(Request $request): \Illuminate\Http\JsonResponse
        {

            $validator = Validator::make($request->all(), [
                'AmountFrom' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
                'amountTo' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
                'CoinSymbolFrom' => 'required|string|min:1',
                'CoinSymbolTo' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }
            if ($request->CoinSymbolFrom === $request->CoinSymbolTo){
                return response()->json(['errors' => ["CoinSymbolFrom" => ["Coins must be different"]]], 401);
            }

            $coinFunction = new CoinFunction();
            $courseFunction = new CourseFunction();

            $user = User::where('id', $request->user()->id)->first();
            $coinInfoFrom = Coin::where('simple_name', $request->CoinSymbolFrom)->first();
            $coinInfoTo = Coin::where('simple_name', $request->CoinSymbolTo)->first();

            $Balance = Balance::where("coin_id", $coinInfoFrom['id_coin'])->first();
            if(!$Balance) {
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
                $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
            $convert = $courseFunction->convertCryptoPrice($request->AmountFrom, $request->CoinSymbolFrom, $request->CoinSymbolTo);
            $AmountToUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfoTo['id_coin'], $request->amountTo);
            $AmountFromUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfoFrom['id_coin'], $request->amountFrom);
            if($BalanceUSD < $AmountFromUsd){
                return response()->json(['errors' => ["amountFrom" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfoTo['id_coin'], $convert, "standard");
            $coinFunction->removeBalanceCoin($coinInfoFrom['id_coin'], $request->AmountFrom, "standard");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfoFrom['simple_name'];
            $transaction->Amount = $request->AmountFrom;
            $transaction->Type = "Swap";
            $transaction->Status = "Success";
            $transaction->user_id = $request->user()->id;
            $transaction->save();
            return  response()->json(['message' => 'Swap successfully'], 201);
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

            $Balance = Balance::where("coin_id", $coinInfo['id_coin'])->first();
            if(!$Balance){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
            $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
            if($BalanceUSD < $AmountUsd){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
            $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->Amount = $request->amount;
            $transaction->Type = "TransferToSpot";
            $transaction->Status = "Success";
            $transaction->user_id = $request->user()->id;
            $transaction->save();
            return  response()->json(['message' => 'Transfer successfully'], 201);
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
            if(!$Balance) {
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
            $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
            if($BalanceUSD < $AmountUsd){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
            $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->Amount = $request->amount;
            $transaction->Type = "TransferSpotToBalance";
            $transaction->Status = "Success";
            $transaction->user_id = $request->user()->id;
            $transaction->save();
            return  response()->json(['message' => 'Transfer successfully'], 201);
        }
        function TransferToUser(Request $request){
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
            if($user['email'] === $request->email){
                return response()->json(['errors' => ["email" => ["You can't transfer to yourself"]]], 401);
            }
            $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();
            $UserSend = User::where('email', $request->email)->first();

            $Balance = $coinFunction->getBalanceCoin($coinInfo['id_coin']);
            if(!$Balance) {
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['quantity']);
            $AmountUsd = $courseFunction->getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
            if($BalanceUSD < $AmountUsd){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoinUserID($UserSend['id'], $coinInfo['id_coin'], $request->amount, "standard");
            $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");

            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->user_id = $UserSend['id'];
            $transaction->Amount = $request->amount;
            $transaction->Type = "TransferToUser";
            $transaction->Status = "Success";
            $transaction->save();
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->user_id = $request->user()->id;
            $transaction->Amount = $request->amount;
            $transaction->Type = "TransferToUser";
            $transaction->Status = "Success";
            $transaction->save();
            return  response()->json(['message' => 'Transfer successfully'], 201);



        }
        public function getBalanceCoin(Request $request){
            $validator = Validator::make($request->all(), [
                'CoinSymbol' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }

            $coinFunction = new CoinFunction();
            $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

            $Balance = $coinFunction->getBalanceCoin($coinInfo['id_coin']);
            if($Balance){
                $Balance = $Balance['quantity'];
            }
            else{
                $Balance = 0;
            }

            return  response()->json(['balance' => $Balance], 201);
        }

        public function getBalanceCoinSpot(Request $request){
            $validator = Validator::make($request->all(), [
                'CoinSymbol' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }

            $coinFunction = new CoinFunction();
            $coinInfo = Coin::where('simple_name', $request->CoinSymbol)->first();

            $Balance = $coinFunction->getBalanceCoinSpot($coinInfo['id_coin']);
            if($Balance){
                $Balance = $Balance['quantity'];
            }
            else{
                $Balance = 0;
            }

            return  response()->json(['balance' => $Balance], 201);
        }
        public function convertCryptoPrice(Request $request){
            $validator = Validator::make($request->all(), [
                'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:1',
                'CoinSymbolFrom' => 'required|string|min:1',
                'CoinSymbolTo' => 'required|string|min:1',
            ]);
               if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 401);
                }
                if ($request->CoinSymbolFrom === $request->CoinSymbolTo){
                    return response()->json(['errors' => ["CoinSymbolFrom" => ["Coins must be different"]]], 401);
                }
                $courseFunction = new CourseFunction();
                $price = $courseFunction->convertCryptoPrice($request->amount, $request->CoinSymbolFrom, $request->CoinSymbolTo);

                return  response()->json(['price' => $price], 201);

        }

}
