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
    public function index($pair)
    {
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();
        $coins = Coin::where("trade_active", "1")->get()->toArray();
        $coin = explode("_", $pair);
        $coin = $coin[0];
        $coin = Coin::where("simple_name", $coin)->first();

        $balanceCoin = $coinFunction->getBalanceCoinSpot($coin['id_coin']);
        if ($balanceCoin) {
            $balanceCoin = $balanceCoin['quantity'];
        } else {
            $balanceCoin = 0;
        }

        $balanceUSDT = $coinFunction->getBalanceCoinSpot(192);
        if ($balanceUSDT) {
            $balanceUSDT = $balanceUSDT['quantity'];
        } else {
            $balanceUSDT = 0;
        }

        $openOrders = Order::where("user_id", auth()->user()->id)->where("status", "open")->get()->toArray();
        $closeOrders = Order::where("user_id", auth()->user()->id)->where("status", "!=", "open")->get()->toArray();


        return view("trade", [
            "balanceCoin" => $balanceCoin, "balanceUsdt" => $balanceUSDT,
            "openOrders" => $openOrders, "closeOrders" => $closeOrders,
            "coin" => $coin, "pair" => $pair, "coins" => $coins]);
    }

    public function redirect()
    {
        return redirect(route("trade:pair", "BTC_USDT"));
    }

    public function createOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0.00000001',
            'coin_symbol' => 'required',
            'type_trade' => 'required|in:buy,sell',
            'type_order' => 'required|in:market,limit'


        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();

        $amount = $request->amount;

        $coin = $coinFunction->getCoinInfo($request->coin_symbol);
        $typeTrade = $request->type_trade;
        $typeOrder = $request->type_order;
        $price = $coin['course'];
        $order = new Order();
        if ($typeOrder == "market") {
            $amount = $courseFunction->convertCryptoPrice($amount, 192, $coin['id_coin']);
            if ($typeTrade == "buy") {
                $balance = $coinFunction->getBalanceCoinSpot(192);
                if ($balance['quantity'] >= $request->amount) {
                    $coinFunction->removeBalanceCoin(192, $request->amount, "spot");
                } else {
                    return response()->json(['errors' => ["order" => ["Insufficient funds"]]], 401);
                }
            } else {
                $balance = $coinFunction->getBalanceCoinSpot($coin['id_coin']);
                if ($balance['quantity'] >= $request->amount) {
                    $amount = $request->amount;
                    $coinFunction->removeBalanceCoin($coin['id_coin'], $request->amount, "spot");
                } else {
                    return response()->json(['errors' => ["order" => ["Insufficient funds"]]], 401);
                }
            }

        }
        if ($typeOrder == "limit") {
            $balance = $coinFunction->getBalanceCoinSpot($coin['id_coin']);
            if ($balance['quantity'] >= $request->amount) {
                $coinFunction->removeBalanceCoin($coin['id_coin'], $amount, "spot");
            } else {
                return response()->json(['errors' => ["order" => ["Insufficient funds"]]], 401);
            }
        }


        $order->user_id = $request->user()->id;
        $order->symbol = $coin['simple_name'];
        $order->type_order = $typeOrder;
        $order->type_trade = $typeTrade;
        $order->open_order_price = $price;
        $order->amount = $amount;
        $order->status = "open";
        if ($typeOrder == "limit") {
            $order->close_order_price = $request->close_order_price;
        }
        $order->save();

        return response()->json(['message' => "Order created successfully"], 201);
    }

    public function closeOrder(Request $request)
    {
        $CF = new CourseFunction();
        $order = Order::where("id", $request->id)->where("user_id", $request->user()->id)->first();
        if ($order) {
            if ($order->status !== "Closed") {
                $order->status = "Closed";
                $order->close_order_price = (new CourseFunction())->getCoinPrice($order->symbol);
                $order->date_close = date("Y-m-d H:i:s");
                if ($order->save()) {
                    $coinFunction = new CoinFunction();
                    $coin = $coinFunction->getCoinInfo($order->symbol);
                    if ($order->type_order == "limit") {
                            $coinFunction->addBalanceCoin($coin['id_coin'], $order->amount, "spot");
                    }
                    else{
                        if ($order->type_trade == "buy") {
                            $amount = $CF->convertCryptoPrice($order->amount, $coin['id_coin'], 192);
                            $coinFunction->addBalanceCoin(192, $amount, "spot");
                        } else {
                            $coinFunction->addBalanceCoin($coin['id_coin'], $order->amount, "spot");
                        }

                    }
                    return response()->json(['message' => "Order closed successfully"], 201);

                }
            } else {
                return response()->json(['errors' => ["order" => ["Order is not closed"]]], 401);
            }
        } else {
            return response()->json(['errors' => ["order" => ["Order is not found"]]], 401);
        }
    }

    public function getAssets(Request $request)
    {
        $courseFunction = new CourseFunction();
        $assets = $courseFunction->getAssetsCoin($request->pair);
        $assets['priceChange'] = number_format((float)$assets['priceChange'], 4, '.', '');
        $assets['priceChangePercent'] = number_format((float)$assets['priceChangePercent'], 4, '.', '');
        $assets['weightedAvgPrice'] = number_format((float)$assets['weightedAvgPrice'], 4, '.', '');
        $assets['lastPrice'] = number_format((float)$assets['lastPrice'], 4, '.', '');
        $assets['lastQty'] = number_format((float)$assets['lastQty'], 4, '.', '');
        $assets['bidPrice'] = number_format((float)$assets['bidPrice'], 4, '.', '');
        $assets['openPrice'] = number_format((float)$assets['openPrice'], 4, '.', '');
        $assets['highPrice'] = number_format((float)$assets['highPrice'], 4, '.', '');
        $assets['lowPrice'] = number_format((float)$assets['lowPrice'], 4, '.', '');
        $assets['volume'] = number_format((float)$assets['volume'], 4, '.', '');
        $assets['quoteVolume'] = number_format((float)$assets['quoteVolume'], 4, '.', '');
        return $assets;

    }

    public function getHistoryTrade()
    {
        $CF = new CoinFunction();
        $openOrders = Order::where("user_id", auth()->user()->id)->where("status", "open")->get()->toArray();
        $closeOrders = Order::where("user_id", auth()->user()->id)->where("status", "!=", "open")->get()->toArray();
        foreach ($openOrders as $key => $openOrder) {
            $coin = $CF->getCoinInfo($openOrder['symbol']);
            $openOrders[$key]['price'] = $coin['course'];
        }
        $array = ["OpenOrder" => $openOrders, "CloseOrder" => $closeOrders];
        return response()->json($array, 200);
    }
}
