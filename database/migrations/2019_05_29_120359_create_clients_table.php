<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',25);
            $table->string('last_name',30);
            $table->string('father_name',25);
            $table->integer('gender');
            $table->string('FIN',20);
            $table->string('birth_place',200);
            $table->date('birthday');
            $table->string('phone',30);
            $table->integer('room_no');
            $table->text('peoples');
            $table->integer('people_number_human');
            $table->integer('services');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->string('payment');
            $table->integer('status');
            $table->integer('user_id');
            $table->integer('worker_id');
            $table->timestamps();
        });

   
        DB::table('clients')->insert([
            'first_name' => 'Ali',
            'last_name' => 'Kalbaliyev',
            'father_name'=>'Zohrab',
            'gender'=>0,
            'FIN'=>'1234567',
            'birth_place'=>'Azerbaijan,Baku',
            'birthday'=>date('1998-02-01'),
            'phone'=>'+994500000000',
            'room_no'=>1,
            'peoples'=>'Ali',
            'people_number_human'=>1,
            'services'=>0,
            'check_in'=>Carbon\Carbon::now(),
            'check_out'=>Carbon\Carbon::tomorrow(),
            'payment'=>'3000 AZN',
            'status'=>0,
            'user_id'=>4,
            'worker_id'=>4,
            'created_at'=>Carbon\Carbon::now(),
            'updated_at'=>Carbon\Carbon::now(),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
