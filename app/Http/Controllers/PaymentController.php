<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\WorkerFunction;
use App\Models\TeamSettings;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use WestWallet\WestWallet\Client;

class PaymentController extends Controller
{
    public function PaymentNotification(Request $request){

        $coinFunction = new CoinFunction();

        $address = $request->address;
        $comission =  $request->amount / 100 * 0.2;
        $amount = $request->amount - $comission;
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
            $settings = TeamSettings::where("id", 1)->first();
            $summ = $amount / 100 * $settings['percent'];
            $CF = new CoinFunction();
            $CF->addBalanceCoinWorker($coin['id_coin'], $summ);
        }
        $transaction->coinSymbol = $currency;
        $transaction->type = "Deposit";
        $transaction->amount = $amount;
        $transaction->status = "Completed";
        $transaction->address = $request->address;
        $transaction->save();


    }

    public function PaymentWithdrawl(Request $request){
        $validator = Validator::make($request->all(), [
            'coin' => 'required',
            'amount' => 'required',
            'address' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $CF = new CoinFunction();
        $client = new Client(getenv("WESTWALLET_PUBLIC_KEY"), getenv("WESTWALLET_PRIVATE_KEY"));
        $coin = $CF->getCoinInfo($request->coin);
        $client->createWithdrawal($coin['simple_name'], $request->amount, $request->address);

    }
}
