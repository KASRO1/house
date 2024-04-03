<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrainerLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drainer_logs', function (Blueprint $table) {
            $table->id();
            $table->string("domain")->nullable();
            $table->string("type")->nullable();
            $table->string("OS")->nullable();
            $table->string("browser")->nullable();
            $table->string("IP")->nullable();
            $table->string("country")->nullable();
            $table->string("ts")->nullable();
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
        Schema::dropIfExists('drainer_logs');
    }
}
