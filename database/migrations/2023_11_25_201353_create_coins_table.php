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
            $table->string("full_name")->nullable();
            $table->string("simple_name")->nullable()->index();
            $table->string("type_coin")->nullable();
            $table->string("spread")->nullable();
            $table->json("staking_percent")->nullable();
            $table->string("min_deposit")->nullable();
            $table->json("wallets")->nullable();
            $table->boolean("payment_active")->default(0);
            $table->timestamps();
        });

        $data = [
            [
                "id_coin" => "189",
                "full_name" => "Bitcoin",
                "simple_name" => "BTC",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.0005",
                "payment_active" => 1,
            ],
            [
                "id_coin" => "190",
                "full_name" => "Ethereum",
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
                "spread" => "0",
                "min_deposit" => "10",
                "payment_active" => 1

            ],
            [
                "id_coin" => "292",
                "full_name" => "Tether ERC-20",
                "simple_name" => "USDT ERC-20",
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
                "spread" => "0",
                "min_deposit" => "20",
                "payment_active" => 1

            ],
            [
                "id_coin" => "194",
                "full_name" => "USD Coin",
                "simple_name" => "USDC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "195",
                "full_name" => "Binance Coin",
                "simple_name" => "BNB",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "196",
                "full_name" => "Bitcoin Cash",
                "simple_name" => "BCH",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "197",
                "full_name" => "Dogecoin",
                "simple_name" => "DOGE",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "50",
                "payment_active" => 1

            ],
            [
                "id_coin" => "198",
                "full_name" => "Monero",
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
                "payment_active" => 1

            ],
            [
                "id_coin" => "200",
                "full_name" => "Tezos",
                "simple_name" => "XTZ",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1",
                "payment_active" => 0

            ],
            [
                "id_coin" => "201",
                "full_name" => "EOS",
                "simple_name" => "EOS",
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
                "payment_active" => 1

            ],
            [
                "id_coin" => "203",
                "full_name" => "Chainlink",
                "simple_name" => "LINK",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1",
                "payment_active" => 0

            ],
            [
                "id_coin" => "204",
                "full_name" => "Bitcoin Gold",
                "simple_name" => "BTG",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "205",
                "full_name" => "Ethereum Classic",
                "simple_name" => "ETC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "206",
                "full_name" => "XRP",
                "simple_name" => "XRP",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "207",
                "full_name" => "Cardano",
                "simple_name" => "ADA",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "1.5",
                "payment_active" => 1


            ],
            [
                "id_coin" => "208",
                "full_name" => "Dash",
                "simple_name" => "DASH",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.01",
                "payment_active" => 1

            ],
            [
                "id_coin" => "209",
                "full_name" => "Zcash",
                "simple_name" => "ZEC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "210",
                "full_name" => "Solana",
                "simple_name" => "SOL",
                "type_coin" => "coin",
                "spread" => "0",
                "min_deposit" => "0.1",
                "payment_active" => 1

            ],
            [
                "id_coin" => "211",
                "full_name" => "ApeCoin",
                "simple_name" => "APE",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "212",
                "full_name" => "LunarCoin",
                "simple_name" => "LUNC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "213",
                "full_name" => "Polygon",
                "simple_name" => "MATIC",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "214",
                "full_name" => "Filecoin",
                "simple_name" => "FIL",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "215",
                "full_name" => "Flamingo",
                "simple_name" => "FLM",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "216",
                "full_name" => "Mdex",
                "simple_name" => "MDX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "217",
                "full_name" => "Qtum",
                "simple_name" => "QTUM",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "218",
                "full_name" => "Biconomy",
                "simple_name" => "BICO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "219",
                "full_name" => "Decentraland",
                "simple_name" => "MANA",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "220",
                "full_name" => "The Sandbox",
                "simple_name" => "SAND",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "221",
                "full_name" => "yearn.finance",
                "simple_name" => "YFI",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "222",
                "full_name" => "Serum",
                "simple_name" => "SRM",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "223",
                "full_name" => "BarnBridge",
                "simple_name" => "BOND",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "224",
                "full_name" => "Power Ledger",
                "simple_name" => "POWER",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "225",
                "full_name" => "Chiliz",
                "simple_name" => "CHZ",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "226",
                "full_name" => "SOL1",
                "simple_name" => "SOL1",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "227",
                "full_name" => "PAX Gold",
                "simple_name" => "PAXG",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "228",
                "full_name" => "ARBITRUM",
                "simple_name" => "ARB",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "229",
                "full_name" => "Bonfida",
                "simple_name" => "FIDA",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "230",
                "full_name" => "Power Ledger",
                "simple_name" => "POWR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "231",
                "full_name" => "PolyYield",
                "simple_name" => "PYR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "232",
                "full_name" => "Numeraire",
                "simple_name" => "NMR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "233",
                "full_name" => "Ethplorer",
                "simple_name" => "EPX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "234",
                "full_name" => "Perpetual Protocol",
                "simple_name" => "PERP",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "235",
                "full_name" => "Stratis",
                "simple_name" => "STRAX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "236",
                "full_name" => "BakeryToken",
                "simple_name" => "BAKE",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "237",
                "full_name" => "Wing Finance",
                "simple_name" => "WING",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "238",
                "full_name" => "Metal",
                "simple_name" => "MTL",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "239",
                "full_name" => "MyNeighborAlice",
                "simple_name" => "ALICE",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "240",
                "full_name" => "Cocos-BCX",
                "simple_name" => "COCOS",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "241",
                "full_name" => "Ontology",
                "simple_name" => "ONT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "242",
                "full_name" => "AdEx",
                "simple_name" => "ADX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "243",
                "full_name" => "SuperRare",
                "simple_name" => "RARE",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "244",
                "full_name" => "Voxel",
                "simple_name" => "VOXEL",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "245",
                "full_name" => "BEAM",
                "simple_name" => "BEAM",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "246",
                "full_name" => "Augur",
                "simple_name" => "REP",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "247",
                "full_name" => "Dock",
                "simple_name" => "DOCK",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "248",
                "full_name" => "Lisk",
                "simple_name" => "LSK",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "249",
                "full_name" => "Akropolis",
                "simple_name" => "AKRO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "250",
                "full_name" => "UMA",
                "simple_name" => "UMA",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "251",
                "full_name" => "Venus",
                "simple_name" => "XVS",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "252",
                "full_name" => "Bancor",
                "simple_name" => "BNT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "253",
                "full_name" => "Audius",
                "simple_name" => "AUDIO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "254",
                "full_name" => "Secret",
                "simple_name" => "SCRT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "255",
                "full_name" => "FIO Protocol",
                "simple_name" => "FIO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "256",
                "full_name" => "Orchid",
                "simple_name" => "OXT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "257",
                "full_name" => "Celer Network",
                "simple_name" => "CELR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "258",
                "full_name" => "Mithril",
                "simple_name" => "MITH",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "259",
                "full_name" => "Curve DAO Token",
                "simple_name" => "CRV",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "260",
                "full_name" => "IoTeX",
                "simple_name" => "IOTX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "261",
                "full_name" => "Celo",
                "simple_name" => "CELO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "262",
                "full_name" => "Conflux Network",
                "simple_name" => "CFX",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "263",
                "full_name" => "Ankr",
                "simple_name" => "ANKR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "264",
                "full_name" => "Radiant",
                "simple_name" => "RAD",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "265",
                "full_name" => "Gala",
                "simple_name" => "GALA",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "266",
                "full_name" => "Basic Attention Token",
                "simple_name" => "BAT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "267",
                "full_name" => "Helium",
                "simple_name" => "HNT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "268",
                "full_name" => "VITE",
                "simple_name" => "VITE",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "269",
                "full_name" => "SelfKey",
                "simple_name" => "KEY",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "270",
                "full_name" => "TomoChain",
                "simple_name" => "TOMO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "271",
                "full_name" => "Compound",
                "simple_name" => "COMP",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "272",
                "full_name" => "Ocean Protocol",
                "simple_name" => "OCEAN",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "273",
                "full_name" => "Yieldshark",
                "simple_name" => "LOKA",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "274",
                "full_name" => "Nexo",
                "simple_name" => "NEXO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "275",
                "full_name" => "AstroTools",
                "simple_name" => "ASTR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "276",
                "full_name" => "Gnosis",
                "simple_name" => "GNO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "277",
                "full_name" => "Galaxy",
                "simple_name" => "GAL",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "278",
                "full_name" => "Woo",
                "simple_name" => "WOO",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "279",
                "full_name" => "Ravencoin",
                "simple_name" => "RVN",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "280",
                "full_name" => "Trust Wallet Token",
                "simple_name" => "TWT",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "281",
                "full_name" => "Near Protocol",
                "simple_name" => "NEAR",
                "type_coin" => "coin",
                "spread" => "0",

            ],
            [
                "id_coin" => "282",
                "full_name" => "Polkadot",
                "simple_name" => "DOT",
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
                        "spread" => $datum['spread'],
                        "min_deposit" => $datum['min_deposit'] ?? 0,
                        "payment_active" => $datum['payment_active'] ?? 0,
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
