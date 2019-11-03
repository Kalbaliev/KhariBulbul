<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('floor',2);
            $table->string('room_name',4);
            $table->integer('room_status');
            $table->integer('people_number');
            $table->integer('admin_id');

        });


        DB::table('rooms')->insert(['floor' => '3', 'room_name' => '315','room_status'=>0,'people_number'=>1,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '3', 'room_name' => '316','room_status'=>1,'people_number'=>2,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '4', 'room_name' => '415','room_status'=>1,'people_number'=>2,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '5', 'room_name' => '515','room_status'=>0,'people_number'=>3,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '5', 'room_name' => '516','room_status'=>1,'people_number'=>3,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '6', 'room_name' => '615','room_status'=>1,'people_number'=>4,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '7', 'room_name' => '715','room_status'=>0,'people_number'=>1,'admin_id'=>2]);
        DB::table('rooms')->insert(['floor' => '8', 'room_name' => '715','room_status'=>1,'people_number'=>2,'admin_id'=>2]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
