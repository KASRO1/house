<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKycApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kyc_applications', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("sex");
            $table->string("first_name");
            $table->string("last_name");
            $table->date("data_of_birth");
            $table->string("phone");
            $table->string("country");
            $table->string("city");
            $table->string("address");
            $table->string("zip_code");
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('kyc_applications');
    }
}
