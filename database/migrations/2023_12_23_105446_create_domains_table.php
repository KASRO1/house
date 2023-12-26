<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string("domain")->index();
            $table->integer("user_id")->nullable()->index();
            $table->string("ns");
            $table->string("zone_id");
            $table->string("title");
            $table->string("logo");
            $table->string('stmp_host');
            $table->string("stmp_email");
            $table->string("stmp_password");
            $table->string("status")->default("Pending");
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
        Schema::dropIfExists('domains');
    }
}
