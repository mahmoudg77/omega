<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSliderToPostTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(DB::table('post_types')->find(4)) return;
        DB::table('post_types')->insert(['id'=>4,'name'=>'Slider','created_at'=>'2018-05-18 03:15:05','has_category'=>0,'has_main_file'=>0,'has_main_image'=>1,'has_files'=>0,'has_images'=>0,'has_tags'=>0]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('post_types')->where('id',4)->delete();
    }
}
