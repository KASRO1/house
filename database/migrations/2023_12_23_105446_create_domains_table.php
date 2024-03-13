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
            $table->string("logo")->nullable();
            $table->string('stmp_host');
            $table->string("stmp_email");
            $table->string("stmp_password");
            $table->boolean("drainer");
            $table->text("faq")->nullable();
            $table->string("isGift")->default(0);
            $table->string("amountGift")->nullable();
            $table->string("coinGift")->nullable();
            $table->text("text_gift")->nullable();
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
