<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staking_orders', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("coin_id");
            $table->string("coin_symbol");
            $table->integer("days");
            $table->string("percent");
            $table->string("final_amount");
            $table->string("amount");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staking_orders');
    }
}
