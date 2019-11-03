<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_status');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->text('messages');
            $table->integer('people_number_human');
            $table->integer('user_id');
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
        Schema::dropIfExists('services_log');
    }
}
