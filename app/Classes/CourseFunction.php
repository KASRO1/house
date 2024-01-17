<?php

namespace App\Classes;
use App\Classes\CoinFunction;

class CourseFunction
{
    public function getCoinsPrices($coins){
        $coins_str = join(",", $coins);
        $url = "https://api.coincap.io/v2/assets?ids=". $coins_str;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        $coins = [];
        foreach ($output->data as $coin){

            $coins[$coin->symbol] = [
                'price' => number_format((float)$coin->priceUsd, 2),
                'percent' => number_format((float)$coin->changePercent24Hr, 6)
            ];
        }
        return $coins;
    }
    public function getCoinPrice($coin){
        $coinFunction = new CoinFunction();
        $coin = $coinFunction->getCoinInfo($coin);

        $url = "https://api.coincap.io/v2/assets/". strtolower($coin['id_coingap']);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output);
        return (float)$output->data->priceUsd;
    }
    public function getBalanceCoinToEquivalentUsd($coin, $quantity){
        $price = $this->getCoinPrice($coin);
        $total = $price * $quantity;
        return number_format($total, 2, '.', '');
    }

    public function convertCryptoPrice($amount, $coin1, $coin2) {
        $coinFunction = new CoinFunction();
        $coin_info1 = $coinFunction->getCoinInfo($coin1);
        $coin_info2 = $coinFunction->getCoinInfo($coin2);

        $coin_full_name1 = strtolower($coin_info1['full_name']);
        $coin_full_name2 = strtolower($coin_info2['full_name']);
        $price1 = $this->getCoinPrice($coin_full_name1);
        $price2 = $this->getCoinPrice($coin_full_name2);
        $total = ($price1 / $price2) * $amount;
        return number_format($total, 2, '.', '');
    }
    public function getAssetsCoin($pair) {
        $coin = str_replace('_', '', $pair);
        $coin = strtolower($coin);
        $url = "https://testnet.binancefuture.com/fapi/v1/ticker/24hr?symbol=".urlencode($coin);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        try {
            $output = curl_exec($ch);
            if ($output === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }
        } finally {
            curl_close($ch);
        }

        return json_decode($output, true);
    }

    public function getRecentTrades($pair){
        $coin = str_replace('_', '', $pair);
        $coin = strtolower($coin);
        $url = "https://testnet.binancefuture.com/fapi/v1/trades?symbol=".urlencode($coin)."&limit=1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        try {
            $output = curl_exec($ch);
            if ($output === false) {
                throw new Exception(curl_error($ch), curl_errno($ch));
            }
        } finally {
            curl_close($ch);
        }

        return json_decode($output, true);
    }
}
