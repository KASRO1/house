<?php

namespace App\Http\Controllers;

use App\Classes\CoinFunction;
use App\Classes\CourseFunction;
use App\Models\Coin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TradeController extends Controller
{
    public function index($pair){
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();
        $coins = Coin::where("trade_active", "1")->get()->toArray();
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
            'amount' => 'required|numeric',
            'coin_symbol' => 'required',
            'type_trade' => 'required|in:buy,sell',
            'type_order' => 'required|in:market,limit'


        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }




        $courseFunction = new CourseFunction();
        $coinFunction = new CoinFunction();

        $coin = Coin::where("simple_name", $request->coin_symbol)->first();
        if($request->type_trade == "buy"){
            $coinPrice = $courseFunction->getCoinPrice($coin['simple_name']);
            $total = $request->amount / $coinPrice;
            $balanceCoin = $coinFunction->getBalanceCoinSpot(192);
            if($balanceCoin){
                $balanceCoin = $balanceCoin['quantity'];
            }
            else{
                $balanceCoin = 0;
            }
            if($balanceCoin < $request->amount){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }

            $coinFunction->removeBalanceCoin("192", $request->amount, "spot");
        }
        else{
            $balanceCoin = $coinFunction->getBalanceCoinSpot($coin['id_coin']);
            $total = $request->amount;
            if($balanceCoin){
                $balanceCoin = $balanceCoin['quantity'];
            }
            else{
                $balanceCoin = 0;
            }

            if($balanceCoin < $request->amount){
                return response()->json(['errors' => ["amount" => ["Insufficient funds"]]], 401);
            }
            $coinFunction->removeBalanceCoin($coin['id_coin'], $request->amount, "spot");
        }

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->type_order = $request->type_order;
        $order->type_trade = $request->type_trade;
        $order->symbol = $coin['simple_name'];
        $order->open_order_price = $courseFunction->getCoinPrice($coin['simple_name']);
        $order->amount = $total;
        $order->status = "open";

        if($order->save()){

            return response()->json(['message' => "Order created successfully"], 201);
        }
        else{
            $coinFunction->addBalanceCoin($coin['id_coin'], $request->amount, "spot");
            return response()->json(['errors' => ["order" => ["Order is not created"]]], 401);
        }



    }

    public function closeOrder(Request $request){
        $order = Order::where("id", $request->id)->where("user_id", $request->user()->id)->first();
        if($order){
            if($order->status !== "Closed") {
                $order->status = "Closed";
                $order->close_order_price = (new CourseFunction())->getCoinPrice($order->symbol);
                $order->date_close = date("Y-m-d H:i:s");
                if ($order->save()) {
                    $coinFunction = new CoinFunction();
                    $coin = $coinFunction->getCoinInfo($order->symbol);
                    $coinFunction->addBalanceCoin($coin['id_coin'], $order->amount, "spot");
                    return response()->json(['message' => "Order closed successfully"], 201);

                }
            }
            else{
                return response()->json(['errors' => ["order" => ["Order is not closed"]]], 401);
            }
        }
        else{
            return response()->json(['errors' => ["order" => ["Order is not found"]]], 401);
        }
    }
    public function getAssets(Request $request){
        $courseFunction = new CourseFunction();

        return $courseFunction->getAssetsCoin($request->pair);

    }

    public function getHistoryTrade(){
        $openOrders = Order::where("user_id", auth()->user()->id)->where("status", "open")->get()->toArray();
        $closeOrders = Order::where("user_id", auth()->user()->id)->where("status", "!=", "open")->get()->toArray();
//        foreach ($openOrders as $key => $openOrder){
//            $openOrders[$key]['amount'] = ;
//        }
        $array = ["OpenOrder" => $openOrders, "CloseOrder" => $closeOrders];
        return response()->json($array, 200);
    }
}
