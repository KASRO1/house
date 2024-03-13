<?php

namespace App\Classes;

use App\Models\BindingUser;
use App\Models\WorkerBalances;

class WorkerFunction
{
    public function BindingUser($user_id_worker, $user_id_mamont, $type)
    {
        $domain = $_SERVER['HTTP_HOST'];
        $bindingUser = new BindingUser();
        $bindingUser->user_id_worker = $user_id_worker;
        $bindingUser->user_id_mamont = $user_id_mamont;
        $bindingUser->type = $type;
        $bindingUser->domain = $domain;
        $bindingUser->save();
        if ($bindingUser->wasRecentlyCreated) {
            return true;
        } else {
            return false;
        }

    }

    public function getWorker($user_id_mamont)
    {
        $bindingUser = BindingUser::where("user_id_mamont", $user_id_mamont)->first();
        return $bindingUser;
    }
    public function eligibleMamont($user_id){
        $bindingUser = BindingUser::where("user_id_mamont", $user_id)->where("user_id_worker", auth()->user()->id)->first();
        if($bindingUser){
            return true;
        }
        return false;
    }
    public function withdrawAvailability(){
        $CF = new CoinFunction();
        $CourseFunction = new CourseFunction();
        $totalDeposits = $CF->getTotalDepositUser(auth()->user()->id);
        $min_deposit_for_withdraw_usdt = auth()->user()->min_deposit_for_withdraw;
        if(auth()->user()->withdraw_funds == 1){
            return true;
        }
//        if(auth()->user()->kyc_step == 1 && auth()->user()->email_verif == 1 && auth()->user()->is_2fa == 1
//        && $min_deposit_for_withdraw_usdt <= $totalDeposits){
//            return true;
//        }
        return false;
    }

    public function getPositiveBalancesWorker(){
        $balances = WorkerBalances::where("user_id", auth()->user()->id)->get()->toArray();
        $CF = new CoinFunction();
        $CourseFunction = new CourseFunction();
        foreach ($balances as $key => $balance){
            $balances[$key]['coin'] = $CF->getCoinInfo($balance['coin_id']);
            $balances[$key]['usd'] = $CourseFunction->getBalanceCoinToEquivalentUsd($balances[$key]['coin']['full_name'], $balance['quantity']);
        }
        return $balances;
    }
    public function getTotalBalanceWorker(){
        $balances = WorkerBalances::where("user_id", auth()->user()->id)->where("quantity", ">", 0)->get()->toArray();

        $CF = new CoinFunction();
        $CourseFunction = new CourseFunction();
        $total = 0;
        foreach ($balances as $key => $balance){
            $balances[$key]['coin'] = $CF->getCoinInfo($balance['coin_id']);
            $balances[$key]['usd'] = $CourseFunction->getBalanceCoinToEquivalentUsd($balances[$key]['coin']['full_name'], $balance['quantity']);
            $total += $balances[$key]['usd'];
        }
        return $total;
    }

}
