<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("email")->unique()->index();
            $table->string("ref_code")->nullable();
            $table->string("password");
            $table->integer("kyc_step")->default(0);
            $table->timestamp("last_online")->nullable();
            $table->boolean("is_2fa")->default(0);
            $table->boolean("premium")->default(0);
            $table->boolean("withdraw_funds")->default(0);
            $table->string("secret_2fa");
            $table->boolean("email_verif")->default(0);
            $table->string("users_status")->default("user");
            $table->string("telegram_username")->nullable();
            $table->string("telegram_chat_id")->nullable();
            $table->boolean("isNotification")->default(0);
            $table->boolean("isNewMamont")->default(0);
            $table->boolean("isNewDeposit")->default(0);
            $table->boolean("isNewTicket")->default(0);
            $table->boolean("isNewKyc")->default(0);
            $table->boolean("isManualShow")->default(0);
            $table->text("withdraw_error")->nullable();
            $table->text("personal_withdraw_error")->nullable();
            $table->integer("min_deposit")->nullable();
            $table->integer("min_deposit_for_withdraw")->nullable();
            $table->string("payment_address")->nullable();
            $table->json("wallets")->nullable();
            $table->boolean("promoIsActive")->default(0);
            $table->string("balance")->default(0);
            $table->boolean("wallet_connected")->default(0);
            $table->integer("mentor")->nullable();
            $table->integer("tech_support")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
