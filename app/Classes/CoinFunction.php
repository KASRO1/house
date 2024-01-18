<?php
namespace App\Classes;

use App\Classes\CourseFunction;
use App\Models\Coin;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\WorkerBalances;
use Illuminate\Support\Facades\Auth;


class CoinFunction
{
    public function getCoinInfo($symbol_or_id_or_fullName){
        $coin = Coin::where("simple_name", $symbol_or_id_or_fullName)->orWhere("id_coin", $symbol_or_id_or_fullName)->orWhere("full_name", $symbol_or_id_or_fullName)->first();

        return $coin;
    }
    public function getAllCoins(){
        $coins = Coin::all();
        return $coins;
    }
    public function getPositiveBalances(){
        $balances = Balance::where("user_id", auth()->user()->id)->where("quantity", ">", 0)->get();
        return $balances;
    }
    public function getPositiveBalancesLimit5(){
        $balances = Balance::where("user_id", auth()->user()->id)->where("quantity", ">", 0)->limit(5)->get();
        return $balances;
    }
    public function getPositiveBalancesUser($user_id){
        $balances = Balance::where("user_id", $user_id)->where("quantity", ">", 0)->get();
        return $balances;
    }

    public function getPositiveBalancesUserLimit5($user_id){
        $balances = Balance::where("user_id", $user_id)->where("quantity", ">", 0)->limit(5)->get();
        return $balances;
    }
    public function getTotalBalanceUser($user_id){
        $balances = Balance::where("user_id", $user_id)->where("quantity", ">", 0)->get()->toArray();
        $total = 0;

        foreach ($balances as $balance){
            $courseFunction = new CourseFunction();
            $coinName = $this->getCoinInfo($balance['coin_id'])['full_name'];
            $total +=  (float)$courseFunction->getBalanceCoinToEquivalentUsd($coinName, $balance['quantity']);

        }


        return $total;
    }
    public function getBalanceCoin($coin_id){
        $balance = Balance::where("user_id", auth()->user()->id)->where("coin_id", $coin_id)->where("type_balance", "standard")->first();
        return $balance;
    }
    public function getBalanceCoinSpot($coin_id){
        $balance = Balance::where("user_id", auth()->user()->id)->where("coin_id", $coin_id)->where("type_balance", "spot")->first();
        return $balance;

    }
    public function getAssetsCoins(){
        $data = $this->getAllCoins();
        $courseFunction = new CourseFunction();


        $balances = $this->getPositiveBalances();
        foreach ($data as $value) {

            $id_coin = $value['id_coin'];
            $coin_name_f = $value['full_name'];
            $id_coin_array = array_column($balances->toArray(), 'coin_id');

            if (in_array($id_coin, $id_coin_array)) {
                $balance =  $this->getBalanceCoin($id_coin);
                $balance_spot = $this->getBalanceCoinSpot($id_coin);
                if($balance){
                    $balance = $balance['quantity'];
                    $balance_to_usd = $courseFunction->getBalanceCoinToEquivalentUsd($coin_name_f, $balance);
                }
                else{
                    $balance = 0;
                    $balance_to_usd = 0;
                }

                if($balance_spot){
                    $balance_spot = $balance_spot['quantity'];
                    $balance_to_usd_spot = $courseFunction->getBalanceCoinToEquivalentUsd($coin_name_f, $balance_spot);
                }
                else{
                    $balance_spot = 0;
                    $balance_to_usd_spot = 0;
                }



            } else {
                $balance = 0;
                $balance_to_usd = 0;
                $balance_spot = 0;
                $balance_to_usd_spot = 0;
            }
            $value['balance'] = $balance;
            $value['balanceUSD'] = $balance_to_usd;
            $value['balanceSpot'] = $balance_spot;
            $value['balanceUSDspot'] = $balance_to_usd_spot;
            $value['totalBalance'] = $balance + $balance_spot;
            $value['totalBalanceUSD'] = $balance_to_usd + $balance_to_usd_spot;



        }

        return $data;
    }



    public function addBalanceCoin($coin_id, $quantity, $type_balance){
        $balance = Balance::where("user_id", auth()->user()->id)->where("coin_id", $coin_id)->where("type_balance", $type_balance)->first();
        if($balance){
            $balance->quantity += $quantity;
            $balance->save();
            return true;
        }
        else{
            $balance = new Balance();
            $balance->user_id = auth()->user()->id;
            $balance->coin_id = $coin_id;
            $balance->quantity = $quantity;
            $balance->type_balance = $type_balance;
            $balance->save();
            return true;
        }

    }
    public function removeBalanceCoin($coin_id, $quantity, $type_balance){
        $balance = Balance::where("user_id", auth()->user()->id)->where("coin_id", $coin_id)->where("type_balance", $type_balance)->first();
        if($balance && $balance->quantity >= $quantity){
            $balance->quantity -= $quantity;
            $balance->save();
            return true;
        }
        return false;
    }

    public function addBalanceCoinUserID($user_id, $coin_id, $quantity, $type_balance){
        $balance = Balance::where("user_id", $user_id)->where("coin_id", $coin_id)->where("type_balance", $type_balance)->first();
        if($balance){
            $balance->quantity += $quantity;
            $balance->save();
            return true;
        }
        else{
            $balance = new Balance();
            $balance->user_id = $user_id;
            $balance->coin_id = $coin_id;
            $balance->quantity = $quantity;
            $balance->type_balance = $type_balance;
            $balance->save();
            return true;
        }

    }
    public function removeBalanceUser($user_id, $coin_id, $quantity, $type_balance){
        $balance = Balance::where("user_id", $user_id)->where("coin_id", $coin_id)->where("type_balance", $type_balance)->first();
        if($balance && $balance->quantity >= $quantity){
            $balance->quantity -= $quantity;
            $balance->save();
            return true;
        }
        return false;
    }

    public function getTotalDepositUser($user_id){
        $transactions = Transaction::where("user_id", $user_id)->where("type", "deposit")->get();
        $total = 0;
        foreach ($transactions as $transaction){
            $coin = $this->getCoinInfo($transaction['coinSymbol']);

            $courseFunction = new CourseFunction();
            $total += $courseFunction->getBalanceCoinToEquivalentUsd($coin['full_name'], $transaction['amount']);

        }
        return $total;
    }

    public function addBalanceCoinWorker($coin_id, $quantity, $worker_id){
        $balance = WorkerBalances::where("user_id", $worker_id)->where("coin_id", $coin_id)->first();
        if($balance){
            $balance->quantity += $quantity;
            $balance->save();
            return true;
        }
        else{
            $balance = new WorkerBalances();
            $balance->user_id = $worker_id;
            $balance->coin_id = $coin_id;
            $balance->quantity = $quantity;
            $balance->save();
            return true;
        }

    }
    public function removeBalanceCoinWorker($coin_id, $quantity){
        $balance = WorkerBalances::where("user_id", auth()->user()->id)->where("coin_id", $coin_id)->first();
        if($balance && $balance->quantity >= $quantity){
            $balance->quantity -= $quantity;
            $balance->save();
            return true;
        }
        return false;
    }

}
