<?php

namespace App\Console\Commands;

use App\Classes\CoinFunction;
use App\Classes\CourseFunction;
use App\Models\Order;
use Illuminate\Console\Command;

class CloseOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:closeOrders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close open orders on trade';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where("status", "open")->get();
        $coinFunction = new CoinFunction();
        $courseFunction = new CourseFunction();
        foreach ($orders as $order){
            $coin = $coinFunction->getCoinInfo($order->symbol);
            $price = $courseFunction->getCoinPrice($order->symbol);
            if($order->type_order == "market"){
                if($order->type_trade == "buy"){
                    $coin = $coinFunction->getCoinInfo($order->symbol);
                    $amount = $order->amount ;
                    $coinFunction->addBalanceCoinUserID($order->user_id, $coin['id_coin'], $amount,  "spot");
                }
                else{
                    $amount = $courseFunction->convertCryptoPrice($order->amount, $coin['id_coin'], 192);
                    $coinFunction->addBalanceCoinUserID($order->user_id, 192, $amount, "spot");
                }
            }
            if($order->type_order == "limit"){
                $close_price = $order->close_order_price;
                if($order->type_trade == "buy"){
                    $coin = $coinFunction->getCoinInfo($order->symbol);

                    if($coin['course'] >= $close_price){
                        $amount = $order->amount ;
                        $coinFunction->addBalanceCoinUserID($order->user_id, $coin['id_coin'], $amount,  "spot");
                    }


                }
                else{
                    if($coin['course'] >= $close_price) {
                        $amount = $courseFunction->convertCryptoPrice($order->amount, $coin['id_coin'], 192);
                        $coinFunction->addBalanceCoinUserID($order->user_id, 192, $amount, "spot");
                    }
                }
            }
            $order->status = "Closed";
            $order->date_close = date("Y-m-d H:i:s");
            $order->close_order_price = $price;
            $order->save();
        }
        return 0;
    }
}
