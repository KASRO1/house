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
        public function swapToSpot(Request $request){

            $validator = Validator::make($request->all(), [
                'amountFrom' => 'required|int|min:1',
                'amountTo' => 'required|int|min:1',
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
            return  response()->json(['message' => 'Swap successfully'], 201);
        }

        public function swapBalanceCoin(Request $request){
            $validator = Validator::make($request->all(), [
                'amountFrom' => 'required|int|min:1',
                'amountTo' => 'required|int|min:1',
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
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
            $AmountToUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfoTo['id_coin'], $request->amountTo);
            $AmountFromUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfoFrom['id_coin'], $request->amountFrom);
            if($BalanceUSD < $AmountFromUsd){
                return response()->json(['errors' => ["amountFrom" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfoTo['id_coin'], $request->amountTo, "standard");
            $coinFunction->removeBalanceCoin($coinInfoFrom['id_coin'], $request->amountFrom, "standard");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfoFrom['simple_name'];
            $transaction->Amount = $AmountFromUsd;
            $transaction->Type = "Swap";
            $transaction->Status = "Success";
            return  response()->json(['message' => 'Swap successfully'], 201);
        }


        public function TransferToSpot(Request $request){
            $validator = Validator::make($request->all(), [
                'amount' => 'required|int|min:1',
                'CoinSymbol' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }
            $coinFunction = new CoinFunction();
            $courseFunction = new CourseFunction();

            $user = User::where('id', $request->user()->id)->first();
            $coinInfo = Coin::where('symbol', $request->CoinSymbol)->first();

            $Balance = Balance::where("coin_id", $coinInfo['id_coin'])->first();
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
            $AmountUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
            if($BalanceUSD < $AmountUsd){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
            $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->Amount = $AmountUsd;
            $transaction->Type = "TransferToSpot";
            $transaction->Status = "Success";
            return  response()->json(['message' => 'Transfer successfully'], 201);
        }

        function TransferSpotToBalance(Request $request){
            $validator = Validator::make($request->all(), [
                'amount' => 'required|int|min:1',
                'CoinSymbol' => 'required|string|min:1',
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 401);
            }
            $coinFunction = new CoinFunction();
            $courseFunction = new CourseFunction();

            $user = User::where('id', $request->user()->id)->first();
            $coinInfo = Coin::where('symbol', $request->CoinSymbol)->first();

            $Balance = Balance::where("coin_id", $coinInfo['id_coin'])->first();
            $BalanceUSD = $courseFunction->getBalanceCoinToEquivalentUsd($Balance['coin_id'], $Balance['balances']);
            $AmountUsd = $courseFunction-getBalanceCoinToEquivalentUsd($coinInfo['id_coin'], $request->amount);
            if($BalanceUSD < $AmountUsd){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->addBalanceCoin($coinInfo['id_coin'], $request->amount, "standard");
            $coinFunction->removeBalanceCoin($coinInfo['id_coin'], $request->amount, "spot");
            $transaction = new Transaction();
            $transaction->CoinSymbol = $coinInfo['simple_name'];
            $transaction->Amount = $AmountUsd;
            $transaction->Type = "TransferSpotToBalance";
            $transaction->Status = "Success";
            return  response()->json(['message' => 'Transfer successfully'], 201);
        }

}
