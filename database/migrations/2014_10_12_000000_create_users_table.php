<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('first_name','25');
            $table->string('last_name','30');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('status');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(['name' => 'newuser', 'first_name' => 'Ali','last_name'=>'Kalbaliyev','email'=>'newuser@kharibulbul.com','password'=>bcrypt('123456'),'status'=>0, 'created_at'=>Carbon\Carbon::now(),'updated_at'=>Carbon\Carbon::now()]);
        DB::table('users')->insert(['name' => 'admin', 'first_name' => 'Ali','last_name'=>'Kalbaliyev','email'=>'admin@kharibulbul.com','password'=>bcrypt('123456'),'status'=>1, 'created_at'=>Carbon\Carbon::now(),'updated_at'=>Carbon\Carbon::now()]);
        DB::table('users')->insert(['name' => 'author', 'first_name' => 'Ali','last_name'=>'Kalbaliyev','email'=>'author@kharibulbul.com','password'=>bcrypt('123456'),'status'=>2,'created_at'=>Carbon\Carbon::now(),'updated_at'=>Carbon\Carbon::now()]);
        // DB::table('users')->insert(['name' => 'un_client', 'first_name' => 'Ali','last_name'=>'Kalbaliyev','email'=>'un.client@kharibulbul.com','password'=>bcrypt('123456'),'status'=>8]);
        DB::table('users')->insert(['name' => 'client', 'first_name' => 'Ali','last_name'=>'Kalbaliyev','email'=>'clientv@kharibulbul.com','password'=>bcrypt('123456'),'status'=>9, 'created_at'=>Carbon\Carbon::now(),'updated_at'=>Carbon\Carbon::now()]);
    
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
