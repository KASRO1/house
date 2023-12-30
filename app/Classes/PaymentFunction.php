<?php

namespace App\Classes;

use App\Models\Coin;
use WestWallet\WestWallet\Client;
use WestWallet\WestWallet\CurrencyNotFoundException;
class PaymentFunction
{

    public function generateWallets(){
        $domain = $_SERVER['HTTP_HOST'];
        $client = new Client(getenv("WESTWALLET_PUBLIC_KEY"), getenv("WESTWALLET_PRIVATE_KEY"));
        $addresses = [];
        $coins = Coin::where("payment_active", 1)->get();
        foreach ($coins as $coin){
            try {
                if($coin['simple_name'] == "USDT TRC-20") {
                    $address = $client->generateAddress("USDTTRC");
                    $addresses[$coin['simple_name']] = $address['address'];
                    continue;
                }
                else if($coin['simple_name'] == "USDT ERC-20") {
                    $address = $client->generateAddress("USDT");
                    $addresses[$coin['simple_name']] = $address['address'];
                    continue;
                }
                $address = $client->generateAddress($coin['simple_name'], );
                $addresses[$coin['simple_name']] = $address['address'];
            } catch (\Exception $exception){

                $addresses[$coin['simple_name']] = "This currency doesn't exist!";
            }


        }

        return json_encode($addresses);
    }
}
