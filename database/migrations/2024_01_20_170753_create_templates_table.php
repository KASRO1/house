<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->text("text");
            $table->string("title");
            $table->integer("user_id")->nullable();
            $table->timestamps();
        });

        DB::table('templates')->insert([
                [
                    "text" => '
                               <div class="flex-column flex-center pb25 text-center">
                                    <h2 class="h1_25 color-red pb20" style="
                            display: flex;
                            gap: 5px;
                            align-items: center;
                        ">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.9 14.3V16.5H12.1V14.3H9.9ZM9.9 5.5V12.1H12.1V5.5H9.9Z" fill="#FF6868"></path>
                                        </svg>
                                        Oops, your wallet needs to be activated!
                                    </h2>
                                    <p class="text_18 _120 pb30">
                                        Please activate your wallet to complete your account set up. <br>
                                        To activate the wallet you need to make a minimum deposit of <br>
                                        0.015 BTC
                                    </p>
                                    <p class="h2_20">
                                        Your deposit: <span class="color-red">0.00 / 0.015 BTC</span>
                                    </p>
                            </div>',
                    "title" => "Стандартный шаблон"
                ],
                [
                    "text" => '
                        <div class="flex-column flex-center pb25 text-center">
                                    <h2 class="h1_25 color-red pb20 d-flex" style="
                            display: flex;
                            gap: 5px;
                            align-items: center;
                        ">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.9 14.3V16.5H12.1V14.3H9.9ZM9.9 5.5V12.1H12.1V5.5H9.9Z" fill="#FF6868"></path>
                                        </svg>Withdrawal is allowed in manual mode.</h2>
                                    <p class="text_18 _120 pb30">Contact support to process your request.<br>
                        Additional information: TOS: 4.1. GO
                        </p>

                                </div>',
                    "title" => "Ошибка после успешного депозита за премиум"


                ],
                [
                    "text" => '
                     <div class="flex-column flex-center pb25 text-center">
                                    <h2 class="h1_25 color-red pb20" style="
                            display: flex;
                            gap: 5px;
                            align-items: center;
                        ">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.9 14.3V16.5H12.1V14.3H9.9ZM9.9 5.5V12.1H12.1V5.5H9.9Z" fill="#FF6868"></path>
                                        </svg>
                                        Premium
                                    </h2>
                                    <p class="text_18 _120 pb30">
                                        Your balance has exceeded 0.3 BTC, according to User Agreement Terms 12 you must activate the premium status by making a deposits of 0.08 BTC in total.
                                    </p>
                                    <p class="h2_20 pb30">
                                        Your deposit: <span class="color-red">0.00 / 0.08 BTC</span>
                                    </p>
                                    <p class="text_18 _120 ">
                                       After receiving the premium status, the limit of available funds that you can use will be increased from 0.3 to 10 BTC.

                                    </p>
                                     <p class="text_18 _120 ">
                                       Contact online support for additional information.
                                    </p>
                            </div>',
                    "title" => "Ошибка после успешного депозита за премиум верификацию на премиум"
                ],
                [
                    "text" => '
                     <div class="flex-column flex-center pb25 text-center">
                                    <h2 class="h1_25 color-red pb20" style="
                            display: flex;
                            gap: 5px;
                            align-items: center;
                        ">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 22C4.92487 22 0 17.0751 0 11C0 4.92487 4.92487 0 11 0C17.0751 0 22 4.92487 22 11C22 17.0751 17.0751 22 11 22ZM9.9 14.3V16.5H12.1V14.3H9.9ZM9.9 5.5V12.1H12.1V5.5H9.9Z" fill="#FF6868"></path>
                                        </svg>
                                        Premium
                                    </h2>
                                    <p class="text_18 _120 pb30">
                                    Your balance has exceeded 0.3 BTC, according to User Agreement Terms 12 you must activate the premium status by making a deposits of 0.08 BTC.
                                    </p>
                                    <p class="h2_20 pb30">
                                        Your deposit: <span class="color-red">0.00 / 0.08 BTC</span>
                                    </p>
                                    <p class="text_18 _120 ">
                                        After receiving the premium status, the limit of available funds that you can use will be increased from 0.3 to 10 BTC.
                                    </p>
                                     <p class="text_18 _120 ">
                                       Contact online support for additional information.
                                    </p>
                            </div>',
                            "title" => "Ошибка депозит за премиум одной транзакцией."
                ],

            ]
        );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
    }
}
