<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('ldl_cholesterol')->nullable();
            $table->string('fat_percentage')->nullable();
            $table->string('systolic_blood_pressure')->nullable();
            $table->string('diastolic_blood_pressure')->nullable();
            $table->string('hdl_cholesterol')->nullable();
            $table->string('start_date_time')->nullable();
            $table->string('end_date_time')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('health');
    }
}
