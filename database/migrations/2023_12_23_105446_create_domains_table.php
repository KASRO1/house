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
            $table->text("tearms_text")->nullable();

            $table->string("isGift")->default(0);
            $table->string("about_text1")->nullable();
            $table->string("about_text2")->nullable();
            $table->string("about_img1")->nullable();
            $table->string("about_img2")->nullable();
            $table->string("status")->nullable();
            $table->string("amountGift")->nullable();
            $table->string("coinGift")->nullable();
            $table->text("text_gift")->nullable();
            $table->json("stacking_percent")->nullable();
            $table->json("spread_coins")->nullable();
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
