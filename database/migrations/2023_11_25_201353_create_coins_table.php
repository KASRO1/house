<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Coin;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->id("id_coin");
            $table->string("id_coingap")->nullable();
            $table->string("full_name")->nullable();
            $table->string("simple_name")->nullable()->index();
            $table->string("type_coin")->nullable();
            $table->string("spread")->nullable();
            $table->json("staking_percent")->nullable();
            $table->string("min_deposit")->nullable();
            $table->json("wallets")->nullable();
            $table->boolean("payment_active")->default(0);
            $table->boolean("trade_active")->default(1);
            $table->string("course")->nullable();
            $table->timestamps();
        });

        $data = [
            [
                "id_coin" => "189",
                "full_name" => "Bitcoin",
                "simple_name" => "BTC",
                "type_coin" => "coin",
                "id_coingap" => "bitcoin",
                "spread" => "0",
                "min_deposit" => "0.0005",
                "payment_active" => 1,
            ],
            [
                "id_coin" => "190",
                "full_name" => "Ethereum",
                "id_coingap" => "ethereum",
                "simple_name" => "ETH",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.01",
                "payment_active" => 1
            ],
            [
                "id_coin" => "191",
                "full_name" => "Litecoin",
                "simple_name" => "LTC",
                "id_coingap" => "litecoin",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.025",
                "payment_active" => 1
            ],
            [
                "id_coin" => "192",
                "full_name" => "Tether TRC-20",
                "simple_name" => "USDT TRC-20",
                "type_coin" => "coin",
                "id_coingap" => "tether",
                "spread" => "0",
                "min_deposit" => "10",
                "payment_active" => 1,
                "trade_active" => 0,

            ],
            [
                "id_coin" => "292",
                "full_name" => "Tether ERC-20",
                "simple_name" => "USDT ERC-20",
                "trade_active" => 0,
                "id_coingap" => "tether",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "10",
                "payment_active" => 1


            ],
            [
                "id_coin" => "193",
                "full_name" => "Tron",
                "simple_name" => "TRX",
                "type_coin" => "coin",
                "id_coingap" => "tron",
                "spread" => "0",
                "min_deposit" => "20",
                "payment_active" => 1

            ],
            [
                "id_coin" => "194",
                "full_name" => "USD Coin",
                "simple_name" => "USDC",
                "id_coingap" => "usd-coin",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "195",
                "full_name" => "BNB",
                "simple_name" => "BNB",
                "id_coingap" => "binance-coin",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "196",
                "full_name" => "Bitcoin Cash",
                "id_coingap" => "bitcoin-cash",
                "simple_name" => "BCH",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "197",
                "full_name" => "Dogecoin",
                "simple_name" => "DOGE",
                "id_coingap" => "dogecoin",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "50",
                "payment_active" => 1

            ],
            [
                "id_coin" => "198",
                "full_name" => "Monero",
                "id_coingap" => "monero",
                "simple_name" => "XMR",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.01",
                "payment_active" => 1
            ],
            [
                "id_coin" => "199",
                "full_name" => "Stellar",
                "simple_name" => "XLM",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "10",
                "payment_active" => 1,
                "id_coingap" => "stellar",

            ],
            [
                "id_coin" => "200",
                "full_name" => "Tezos",
                "simple_name" => "XTZ",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1",
                "id_coingap" => "tezos",
                "payment_active" => 0

            ],
            [
                "id_coin" => "201",
                "full_name" => "EOS",
                "simple_name" => "EOS",
                "id_coingap" => "eos",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1",
                "payment_active" => 1

            ],
            [
                "id_coin" => "202",
                "full_name" => "Shiba Inu",
                "simple_name" => "SHIB",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1000000",
                "id_coingap" => "shiba-inu",
                "payment_active" => 1

            ],
            [
                "id_coin" => "203",
                "full_name" => "Chainlink",
                "simple_name" => "LINK",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1",
                "id_coingap" => "chainlink",
                "payment_active" => 0

            ],
            [
                "id_coin" => "204",
                "full_name" => "Bitcoin Gold",
                "simple_name" => "BTG",
                "type_coin" => "coin",
                "id_coingap" => "bitcoin-gold",
                "spread" => "0",

            ],
            [
                "id_coin" => "205",
                "full_name" => "Ethereum Classic",
                "id_coingap" => "ethereum-classic",
                "simple_name" => "ETC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "206",
                "full_name" => "XRP",
                "simple_name" => "XRP",
                "type_coin" => "coin",
                "id_coingap" => "xrp",
                "spread" => "0",

            ],
            [
                "id_coin" => "207",
                "full_name" => "Cardano",
                "simple_name" => "ADA",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1.5",
                "id_coingap" => "cardano",
                "payment_active" => 1


            ],
            [
                "id_coin" => "208",
                "full_name" => "Dash",
                "simple_name" => "DASH",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.01",
                "id_coingap" => "dash",
                "payment_active" => 1

            ],
            [
                "id_coin" => "210",
                "full_name" => "Solana",
                "simple_name" => "SOL",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.1",
                "id_coingap" => "solana",
                "payment_active" => 1

            ],

            [
                "id_coin" => "213",
                "full_name" => "Polygon",
                "simple_name" => "MATIC",
                "type_coin" => "coin",
                "id_coingap" => "polygon",
                "spread" => "0",

            ],
            [
                "id_coin" => "214",
                "full_name" => "Filecoin",
                "simple_name" => "FIL",
                "type_coin" => "coin",
                "id_coingap" => "filecoin",
                "spread" => "0",

            ],
            [
                "id_coin" => "219",
                "full_name" => "Decentraland",
                "simple_name" => "MANA",
                "type_coin" => "coin",
                "id_coingap" => "decentraland",
                "spread" => "0",

            ],
            [
                "id_coin" => "220",
                "full_name" => "The Sandbox",
                "simple_name" => "SAND",
                "type_coin" => "coin",
                "id_coingap" => "the-sandbox",
                "spread" => "0",

            ],

            [
                "id_coin" => "225",
                "full_name" => "Chiliz",
                "simple_name" => "CHZ",
                "id_coingap" => "chiliz",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "259",
                "full_name" => "Curve DAO Token",
                "id_coingap" => "curve-dao-token",
                "simple_name" => "CRV",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "260",
                "full_name" => "IoTeX",
                "simple_name" => "IOTX",
                "id_coingap" => "iotex",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "261",
                "full_name" => "Celo",
                "simple_name" => "CELO",
                "id_coingap" => "celo",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "262",
                "full_name" => "Conflux Network",
                "simple_name" => "CFX",
                "id_coingap" => "conflux-network",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "265",
                "full_name" => "Gala",
                "simple_name" => "GALA",
                "id_coingap" => "gala",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "266",
                "full_name" => "Basic Attention Token",
                "simple_name" => "BAT",
                "id_coingap" => "basic-attention-token",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "267",
                "full_name" => "Helium",
                "simple_name" => "HNT",
                "id_coingap" => "helium",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "271",
                "full_name" => "Compound",
                "simple_name" => "COMP",
                "id_coingap" => "compound",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "274",
                "full_name" => "Nexo",
                "simple_name" => "NEXO",
                "id_coingap" => "nexo",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "276",
                "full_name" => "Gnosis",
                "simple_name" => "GNO",
                "id_coingap" => "gnosis-gno",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "278",
                "full_name" => "Woo",
                "simple_name" => "WOO",
                "id_coingap" => "wootrade",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "280",
                "full_name" => "Trust Wallet Token",
                "simple_name" => "TWT",
                "id_coingap" => "trust-wallet-token",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "281",
                "full_name" => "Near Protocol",
                "simple_name" => "NEAR",
                "id_coingap" => "near-protocol",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "282",
                "full_name" => "Polkadot",
                "simple_name" => "DOT",
                "id_coingap" => "polkadot",
                "type_coin" => "coin",
                "spread" => "0",

            ],
        ];

        foreach ($data as $datum) {
            DB::table('coins')->insert([
                    [
                        "id_coin" => $datum['id_coin'],
                        "full_name" => $datum['full_name'],
                        "simple_name" => $datum['simple_name'],
                        "type_coin" => "coin",
                        "id_coingap" => $datum['id_coingap'],
                        "spread" => $datum['spread'],
                        "min_deposit" => $datum['min_deposit'] ?? 0,
                        "payment_active" => $datum['payment_active'] ?? 0,
                        "trade_active" => $datum['trade_active'] ?? 1,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s"),
                    ]]
            );

        }


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coins');
    }
}
