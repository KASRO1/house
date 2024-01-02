<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\WorkerFunction;
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

        $workerFunction = new WorkerFunction();
        $worker_id = $workerFunction->getWorker($user['id']);

        $coin = $coinFunction->getCoinInfo($currency);
        $coinFunction->addBalanceCoinUserID($user['id'], $coin['id_coin'], $amount, "standard");
        $transaction = new Transaction();
        $transaction->user_id = $user['id'];
        if($worker_id){

            $transaction->worker_id = $worker_id['id'];
        }

        $transaction->coinSymbol = $currency;
        $transaction->type = "deposit";
        $transaction->amount = $amount;
        $transaction->status = "Completed";
        $transaction->address = $request->address;
        $transaction->save();
    }
}
