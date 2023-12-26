<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\PaymentFunction;
use App\Models\BindingUser;
use App\Models\Coin;
use App\Models\kyc_application;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use App\Classes\WorkerFunction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function BindingUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id_mamont' => 'required|unique:binding_users,user_id_mamont',
        ]);


        $user = User::where('email', $request->user_id_mamont)
            ->orWhere('id', $request->user_id_mamont)
            ->first();

        if (!$user) {
            return response()->json(['errors' => ["user_id_mamont" => ["Пользователь не найден"]]], 401);
        }

        if ($request->user()->email == $request->user_id_mamont || $request->user()->id == $request->user_id_mamont) {
            return response()->json(['errors' => ["user_id_mamont" => ["Пользователь уже привязан"]]], 401);
        }

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $workerFunction = new WorkerFunction();
        if ($workerFunction->BindingUser($request->user()->id, $user->id, "manually")) {
            return response()->json(['message' => 'Пользователь успешно привязан'], 201);
        }
    }

    public function show($id){

        $CoinFunction = new CoinFunction();
        $user = User::find($id);
        $kyc_app = kyc_application::where("user_id", $id)->where("status", 1)->first();
        $positive_balanced = $CoinFunction->getPositiveBalancesUserLimit5($id);
        $coins = $CoinFunction->getAllCoins();
        $total_balance = $CoinFunction->getTotalBalanceUser($id);


        if(!$kyc_app){
            $kyc_app['first_name'] = "Неизвестно";
            $kyc_app['last_name'] = "Неизвестно";
            $kyc_app['country'] = "Неизвестно";
            $kyc_app['city'] = "Неизвестно";
            $kyc_app['address'] = "Неизвестно";
            $kyc_app['zip'] = "Неизвестно";
            $kyc_app['phone'] = "Неизвестно";
            $kyc_app['data_of_birth'] = "Неизвестно";
            $kyc_app['sex'] = "Неизвестно";
        }

        $transactions = Transaction::where("user_id", $id)->orderBy("created_at", "desc")->get()->toArray();

        return view("admin.user", ['user' => $user, 'kyc' => $kyc_app,
            'transactions' => $transactions, 'balances' => $positive_balanced,
            "coinFunction" => $CoinFunction, "coins" => $coins,
            "totalBalance" => $total_balance]);
    }

    public function auth($id){
        $user = BindingUser::where("user_id_mamont", $id)->where("user_id_worker", Auth::user()->id)->first();
        if($user){
            $user = User::find($id);
            auth()->login($user);
            return redirect()->route("trade");
        }


    }

    public function changeStatus($id){
        $user = User::find($id);
        if($user->users_status == "user"){
            $user->users_status = "worker";
        }
        else{
            $user->users_status = "user";
        }
        $user->save();
        return redirect()->route("admin.user:id", $id);
    }
    public function updateWallets(){
        $user = Auth::user();
        if(!$user){
            return response()->json(['errors' => ["email" => ["Пользователь не найден"]]], 401);
        }
        $paymentFunction = new PaymentFunction();
        $wallets = $paymentFunction->generateWallets();
        $user->wallets = $wallets;
        $user->save();
        return response()->json(['message' => 'Кошельки успешно добавлены'], 201);

    }
    public function addBalance(Request $request){
        $validator = Validator::make($request->all(), [
            'type_deposit' => 'required',
            'coin_id' => 'required',
            'amount' => 'required|numeric|min:1',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $coinFunction->addBalanceCoinUserID($request->user_id, $request->coin, $request->amount, $request->type_deposit);
        return response()->json(['message' => 'Баланс успешно пополнен'], 201);
    }
    public function removeBalance(Request $request){
        $validator = Validator::make($request->all(), [
            'type_deposit' => 'required',
            'coin' => 'required',
            'amount' => 'required|numeric|min:1',
            'user_id' => 'required|exists:users,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $action = $coinFunction->removeBalanceUser($request->user_id, $request->coin, $request->amount, $request->type_deposit);
        if(!$action){
            return response()->json(['errors' => ["amount" => ["Не удалось отнять баланс, возможно сумма превышает баланса"]]], 401);
        }
        return response()->json(['message' => 'Баланс успешно уменьшен'], 201);
    }

    public function getWallet(Request $request){
        $validator = Validator::make($request->all(), [
            'coin' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }
        $user = Auth::user();
        if(!$user){
            return response()->json(['errors' => ["email" => ["Пользователь не найден"]]], 401);
        }
        $coinFunction = new CoinFunction();
        $coin = $coinFunction->getCoinInfo($request->coin);
        $min_deposit = $coin['min_deposit'];
        $wallets = json_decode($user->wallets, true);

        return response()->json(['wallet' => $wallets[$request->coin], "min_deposit" => $min_deposit], 201);
    }


}
