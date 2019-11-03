<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',25);
            $table->string('last_name',30);
            $table->string('work_name',50);
            $table->string('photo_name',20);
            $table->integer('floor');
            $table->integer('p_or_e');

        });

       
        DB::table('personals')->insert(['first_name' => 'Elvin', 'last_name' => 'Cabizade','work_name'=>'Accountant','photo_name'=>'elvin','floor'=>3,'p_or_e'=>1]);
        DB::table('personals')->insert(['first_name' => 'Husein', 'last_name' => 'Hajizade','work_name'=>'Driver','photo_name'=>'husein','floor'=>1,'p_or_e'=>0]);
        DB::table('personals')->insert(['first_name' => 'Vugar', 'last_name' => 'Yarahkmedov','work_name'=>'Bodyguard','photo_name'=>'vugar','floor'=>1,'p_or_e'=>0]);
        DB::table('personals')->insert(['first_name' => 'Tural', 'last_name' => 'Rzazadeh','work_name'=>'Cook','photo_name'=>'tural','floor'=>7,'p_or_e'=>0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
}
