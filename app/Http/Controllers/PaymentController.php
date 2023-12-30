<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function PaymentNotification(Request $request){

        $coinFunction = new CoinFunction();

        $address = $request->address;
        $amount = $request->amount;
        $currency = $request->currency;

        $user = User::where("wallets", "like", "%$address%")->first();
        if(!$user){
            return response()->json(['message' => 'User not found'], 200);
        }
        $coin = $coinFunction->getCoinInfo($currency);
        $coinFunction->addBalanceCoinUserID($user['id'], $coin['id_coin'], $amount, "standard");
        $transaction = new Transaction();
        $transaction->user_id = $user['id'];
        $transaction->coinSymbol = $currency;
        $transaction->type = "deposit";
        $transaction->amount = $amount;
        $transaction->status = "Completed";
        $transaction->address = $request->address;
        $transaction->save();
    }
}
