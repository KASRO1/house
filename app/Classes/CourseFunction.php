<?php

namespace App\Classes;
use App\Classes\CoinFunction;

class CourseFunction
{

    public function getCoinPrice($coin){
        $coinFunction = new CoinFunction();

        $coin = $coinFunction->getCoinInfo($coin);
        $url = "https://api.coincap.io/v2/assets/". strtolower($coin['full_name']);
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
        $coin_info1 = $this->getCoinInfo($coin1);
        $coin_info2 = $this->getCoinInfo($coin2);
        $coin_full_name1 = strtolower($coin_info1['full_name']);
        $coin_full_name2 = strtolower($coin_info2['full_name']);
        $price1 = $this->getCoinPrice($coin_full_name1);
        $price2 = $this->getCoinPrice($coin_full_name2);
        $total = ($price1 / $price2) * $amount;
        return number_format($total, 2, '.', '');
    }
}
