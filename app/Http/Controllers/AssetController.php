<?php

namespace App\Http\Controllers;

use App\Classes\CourseFunction;
use App\Models\Balance;
use App\Models\Coin;
use App\Models\StakingOrder;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Classes\CoinFunction;

class AssetController extends Controller
{
    public function index(){
        
        $coinsPayment = Coin::where("payment_active", "1")->get();
        $coins = Coin::all();
        $CourseFunction = new CourseFunction();
        $CoinFunction = new CoinFunction();
        $assets = $CoinFunction->getAssetsCoins();
        $transactions = Transaction::where("user_id", auth()->user()->id)->orderBy("id", "desc")->get();
        $stakingOrders = StakingOrder::where("user_id", auth()->user()->id)->orderBy("id", "desc")->get();
        $totalBalance = ["balanceUSD" => 0, "balanceUSDspot" => 0, "BalanceToBTC" => 0, "BalanceToBTCspot" => 0];

        foreach ($assets as $asset){
            $totalBalance['balanceUSD'] += $asset['balanceUSD'];
            $totalBalance['balanceUSDspot'] += $asset['balanceUSDspot'];
        }
        $price_btc = $CourseFunction->getCoinPrice('BTC');
        if($totalBalance['balanceUSD'] !== 0){
            $totalBalance['BalanceToBTC'] = number_format($totalBalance['balanceUSD'] / $price_btc, 2, '.', '');

        }
        if ($totalBalance['balanceUSDspot'] !== 0){
            $totalBalance['BalanceToBTCspot'] = number_format($totalBalance['balanceUSDspot'] / $price_btc, 2, '.', '');

        }



        $user = auth()->user();
        $user->last_online = now();
        $user->balance = $totalBalance['balanceUSD'];
        $user->save();


        return view("assets", ["coins" => $coins, "Assets" => $assets, "totalBalance" => $totalBalance, "transactions" => $transactions, "stakingOrders" => $stakingOrders, "coinsPayment" => $coinsPayment]);
    }







}
