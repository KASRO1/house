<?php

namespace App\Http\Controllers;

use App\Models\BindingUser;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $Mamonts['data'] = BindingUser::where("user_id_worker", auth()->user()->id)->get()->toArray();
        $MamontsIsVerif = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.kyc_step", ">", 0)
            ->get()
            ->toArray();

        $MamontsIsVerifLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.kyc_step", ">", 0)
            ->whereMonth("binding_users.created_at", 11)
            ->get()
            ->toArray();

        $MamontsIsDeposit = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("transactions", "binding_users.user_id_mamont", "=", "transactions.user_id")
            ->where("transactions.Type", "=", "deposit")
            ->where("transactions.Status", "=", "1")
            ->get()
            ->toArray();

        $MamontsIsDepositLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("transactions", "binding_users.user_id_mamont", "=", "transactions.user_id")
            ->where("transactions.Type", "=", "deposit")
            ->where("transactions.Status", "=", "1")
            ->whereMonth("transactions.created_at", 11)
            ->get()
            ->toArray();

        $MamontsIsBlocked = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.users_status", "=", "blocked")
            ->get()
            ->toArray();

        $MamontsIsBlockedLastMonth = BindingUser::where("user_id_worker", auth()->user()->id)
            ->join("users", "users.id", "=", "binding_users.user_id_mamont")
            ->where("users.users_status", "=", "blocked")
            ->whereMonth("binding_users.created_at", 11)
            ->get()
            ->toArray();

        $lastMonthUsers = BindingUser::where("user_id_worker", auth()->user()->id)
            ->whereMonth("created_at", 11)
            ->get()
            ->toArray();


        $Mamonts['statistic']['total_mamont']['labels'] = [];
        foreach ($Mamonts['data'] as $key => $mamont) {
            $mamontProfileInfo = \App\Models\User::where("id", $mamont['user_id_mamont'])->first()->toArray();

            $mamontProfileInfo['status_online'] = true;
            if($mamontProfileInfo['last_online'] < now()->subMinutes(5)){
                $mamontProfileInfo['status_online'] = false;
            }

            if($mamont['type'] === "promo"){
                $Mamonts['data'][$key]['type'] = "Промокод";
            }
            elseif($mamont['type'] === "manually"){
                $Mamonts['data'][$key]['type'] = "Ручная привязка";
            }
            elseif($mamont['data']['type'] === "domain"){
                $Mamonts['data'][$key]['type'] = "Домен";
            }
            $shortName = substr($mamontProfileInfo['email'], 0, 4);

            $shortNameWithDots = $shortName . '...';

            $Mamonts['data'][$key]['mamontProfileInfo'] = $mamontProfileInfo;
            $date = new Carbon($mamont['created_at']);
            $date = $date->format('d M');
            $Mamonts['statistic']['total_mamont']['labels'][] = '"' . $date . '"';
            $Mamonts['statistic']['total_mamont']['data'][] = 1;


        }

        if(count($Mamonts['statistic']['total_mamont']['labels']) > 0 && count($Mamonts['statistic']['total_mamont']['data']) > 0){
            $Mamonts['statistic']['total_mamont']['labels'] = join(", ", $Mamonts['statistic']['total_mamont']['labels']);
            $Mamonts['statistic']['total_mamont']['data'] = join(", ", $Mamonts['statistic']['total_mamont']['data']);

            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['Total'] = $this->calculatePercentage($Mamonts['data'], $lastMonthUsers);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['isVerification'] = $this->calculatePercentage($MamontsIsVerifLastMonth, $MamontsIsVerif);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['deposit'] = $this->calculatePercentage($MamontsIsDepositLastMonth, $MamontsIsDeposit);
            $Mamonts['statistic']['total_mamont']['lastMonthPercent']['isBlocked'] = $this->calculatePercentage($MamontsIsBlockedLastMonth, $MamontsIsBlocked);

            $Mamonts['statistic']['total_mamont']['lastMonth']['Total'] = count($lastMonthUsers);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isVerification'] = count($MamontsIsVerifLastMonth);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isDeposit'] = count($MamontsIsDepositLastMonth);
            $Mamonts['statistic']['total_mamont']['lastMonth']['isBlocked'] = count($MamontsIsBlockedLastMonth);

            $Mamonts['statistic']['total_mamont']['Total'] = count($Mamonts['data']) ;
            $Mamonts['statistic']['total_mamont']['isVerification'] = count($MamontsIsVerif);
            $Mamonts['statistic']['total_mamont']['isDeposit'] = count($MamontsIsDeposit);
            $Mamonts['statistic']['total_mamont']['isBlocked'] = count($MamontsIsBlocked);

        }
        else{
            $Mamonts['statistic']['total_mamont']['labels'] = "[]";
            $Mamonts['statistic']['total_mamont']['data'] = "[]";
        }


        return view("admin.index", ["mamonts" => $Mamonts]);
    }

    protected function calculatePercentage($current, $lastMonth)
    {
        $currentCount = count($current);
        $lastMonthCount = count($lastMonth);

        // Избегаем деления на 0
        if ($lastMonthCount == 0) {
            return $currentCount == 0 ? 0 : 100;
        }

        return $currentCount / $lastMonthCount * 100;
    }

    public function viewWorkers(){
        $workers = User::where("users_status", "worker")->get()->toArray();
        return view("admin.workers", ["workers" => $workers]);
    }

    public function viewOrders(){
        if(auth()->user()->users_status == "worker"){
        $mamonts = BindingUser::where("user_id_worker", auth()->user()->id)->get()->toArray();
        $orders = [];
        foreach($mamonts as $mamont){
            $transaction = Transaction::where("user_id", $mamont['user_id_mamont'])->where("type", "deposit")->orderBy("created_at", "desc")->get();

            $orders[] = $transaction->toArray();
        }
        }
        elseif(auth()->user()->users_status == "admin"){
            $orders = Transaction::where("type", "deposit")->orderBy("created_at", "desc")->get()->toArray();

        }
        else{
            $orders = [];
        }
        return view("admin.orders", ["orders" => $orders]);
    }



}
