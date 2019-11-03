<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInnovationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('header_title_az',100);
            $table->string('header_title_en',100);
            $table->text('text_az');
            $table->text('text_en');
            $table->string('photo_slug',1);
            $table->string('ribbon_type_name',30);
            $table->string('ribbon_icon_name',30);
            $table->timestamps();

        });

        DB::table('innovations')->insert([
             'header_title_az' =>'Test Reklam 1',
             'header_title_en' =>'Test Advertisement 1',
             'text_az'=>'Khari Bulbul otelində -15% ENDİRİM',
             'text_en'=>'In hotel of Khari Bulbul -15% DISCOUNT',
             'photo_slug'=>'0',
             'ribbon_type_name'=>'ribbon-danger',
             'ribbon_icon_name'=>'shopping-bag',
             'created_at'=>Carbon\Carbon::now(),
             'updated_at'=>Carbon\Carbon::now(),
             ]);
        DB::table('innovations')->insert([
            'header_title_az' => 'Test Reklam 2',
            'header_title_en' => 'Test Advertisement 2',
            'text_az'=>'Pizza Khari restoranında -10% ENDİRİM',
            'text_en'=>'In restaurant of Pizza Khari -10% DISCOUNT',
            'photo_slug'=>'1',
            'ribbon_type_name'=>'ribbon-warning',
            'ribbon_icon_name'=>'cutlery',
            'created_at'=>Carbon\Carbon::now(),
            'updated_at'=>Carbon\Carbon::now(),
            ]);
        DB::table('innovations')->insert([
            'header_title_az' => 'Test Reklam 3',
            'header_title_en' => 'Test Advertisement 3',
            'text_az'=>'Club Khari gecə klubundan -40% ENDİRİM',
            'text_en'=>'In night club of Club Khari -40% DISCOUNT',
            'photo_slug'=>'2',
            'ribbon_type_name'=>'ribbon-dark',
            'ribbon_icon_name'=>'glass',
            'created_at'=>Carbon\Carbon::now(),
            'updated_at'=>Carbon\Carbon::now(),
            ]);
        DB::table('innovations')->insert([
            'header_title_az' => 'Test Reklam 4',
            'header_title_en' => 'Test Advertisement 4',
            'text_az'=>'Healthy Khari fitnes zalında -20% ENDİRİM',
            'text_en'=>'In fitness club of Healthy Khari -20% DISCOUNT',
            'photo_slug'=>'3',
            'ribbon_type_name'=>'ribbon-success',
            'ribbon_icon_name'=>'heartbeat',
            'created_at'=>Carbon\Carbon::now(),
            'updated_at'=>Carbon\Carbon::now(),
            ]);
        DB::table('innovations')->insert([
            'header_title_az' => 'Test Reklam 5',
            'header_title_en' => 'Test Advertisement 5',
            'text_az'=>'Clothes Khari mağazasında -30% ENDİRİM',
            'text_en'=>'In shop of Clothes Khari -30% DISCOUNT',
            'photo_slug'=>'4',
            'ribbon_type_name'=>'ribbon-info',
            'ribbon_icon_name'=>'handsshae-o',
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
        Schema::dropIfExists('innovations');
    }
}
