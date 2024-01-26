<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\Telegram;
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
        $request_ip = $request->ip();
//        if($request_ip != "5.189.219.250"){
//            return response()->json(['message' => 'IP not valid'], 200);
//        }
        $coinFunction = new CoinFunction();

        $address = $request->address;
        $comission =  $request->amount / 100 * 0.2;
        $amount = $request->amount;
        $currency = $request->currency;
        if($currency == "USDTTRC") {
            $currency = "USDT TRC-20";
        }
        else if($currency == "USDT") {
            $currency = "USDT ERC-20";
        }
        $status = $request->status;
        if($status != "completed"){
            return response()->json(['message' => 'Payment not completed'], 200);
        }
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
            $settings = TeamSettings::where("id", "1")->first();
            $summ = $amount / 100 * $settings['percent_profit'];
            $transaction->worker_id = $worker_id['user_id_worker'];
            $worker = User::find($worker_id['user_id_worker']);
            if($worker && $worker['isNotification'] && $worker['isNewDeposit'] && $worker['telegram_chat_id']){
                $telegram = new Telegram();
                $email_mamont = $user['email'];
                $summ = $amount / 100 * $settings['percent_profit'];
                $profit_worker_usd = $coin['course'] * $summ;
                $profit_worker_usd = number_format($profit_worker_usd, 2);;
                $summ_usd =  $coin['course'] * $amount;
                $summ_usd = number_format($summ_usd, 2);
                $worker_tag = $worker['telegram_username'];
                $telegram->sendMessage($worker['telegram_chat_id'], "<b>💰Новый депозит на сумму $amount $currency от $email_mamont!</b>");
                $telegram->sendMessage(env("TELEGRAM_BOT_WORKER_CHAT_ID"), "<b>🎉 Поступила новая оплата</b>\n\n<b>Сервис:</b> <i>Биржа</i>\n<b>Лендинг:</b> <i>Синий</i>\n\n💰<b>Сумма платежа:</b> <i>$amount $currency</i> ($summ_usd$)\n\n<b>Воркер: $worker_tag\n💸 Доля воркера: $profit_worker_usd$</b>");
                $telegram->sendMessage(env("TELEGRAM_BOT_PAYMENT_CHAT_ID"), "<b>🎉 Поступила новая оплата</b>\n\n<b>Сервис:</b> <i>Биржа</i>\n<b>Лендинг:</b> <i>Синий</i>\n\n💰<b>Сумма платежа:</b> <i>$amount $currency</i> ($summ_usd$)\n\n<b>Воркер: $worker_tag\n💸 Доля воркера: $profit_worker_usd$</b>");

            }



            $CF = new CoinFunction();
            $CF->addBalanceCoinWorker($coin['id_coin'], $summ, $worker_id['user_id_worker']);

        }
        $transaction->coinSymbol = $currency;
        $transaction->type = "Deposit";
        $transaction->amount = $amount - $comission;
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
