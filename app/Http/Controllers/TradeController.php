<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\CourseFunction;
use App\Models\Coin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TradeController extends Controller
{
    public function index($pair){
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();
        $coins = Coin::all();
        $coin = explode("_", $pair);
        $coin = $coin[0];
        $coin = Coin::where("simple_name", $coin)->first();

        $balanceCoin = $coinFunction->getBalanceCoinSpot($coin['id_coin']);
        if($balanceCoin){
            $balanceCoin = $balanceCoin['quantity'];
        }
        else{
            $balanceCoin = 0;
        }

        $balanceUSDT = $coinFunction->getBalanceCoinSpot(192);
        if($balanceUSDT){
            $balanceUSDT = $balanceUSDT['quantity'];
        }
        else{
            $balanceUSDT = 0;
        }

        $openOrders = Order::where("user_id", auth()->user()->id)->where("status", "open")->get()->toArray();
        $closeOrders = Order::where("user_id", auth()->user()->id)->where("status", "!=", "open")->get()->toArray();



        return view("trade", [
            "balanceCoin" => $balanceCoin, "balanceUsdt" => $balanceUSDT,
            "openOrders" => $openOrders, "closeOrders" => $closeOrders,
            "coin" => $coin, "pair" => $pair, "coins" => $coins]);
    }

    public function redirect(){
        return redirect(route("trade:pair", "BTC_USDT"));
    }

    public function createOrder(Request $request){
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:1',
            'coin_symbol' => 'required',
            'type_order' => 'required|in:buy,sell',


        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $courseFunction = new CourseFunction();

        $coin = Coin::where("simple_name", $request->coin_symbol)->first();
        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->type_order = "limit";
        $order->type_trade = "buy";
        $order->coin_id = $request->coin_symbol;
        $order->open_order_price = $courseFunction->getCoinPrice($coin['simple_name']);
        $order->amount = $request->amount;
        $order->status = "open";

        if($order->save()){
            return response()->json(['message' => "Order created successfully"], 201);
        }
        else{
            return response()->json(['errors' => ["order" => ["Order is not created"]]], 401);
        }



    }

    public function getAssets(Request $request){
        $courseFunction = new CourseFunction();

        return $courseFunction->getAssetsCoin($request->pair);

    }
}
