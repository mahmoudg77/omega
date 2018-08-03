<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertMenuLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("menus")->delete();
        DB::table("menu_links")->delete();
       DB::table("menus")->insert([
            "id"=>1,"name"=>"Main Menu","location"=>"main","created_at"=>"2018-05-02 07:53:20","updated_at"=>"2018-05-07 08:45:52"
        ]);
      
        DB::table("menu_links")->insert([
            ["id"=>"1","menu_id"=>1,"customlink"=>"/"               ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-02 07:53:20","updated_at"=>"2018-05-07 08:45:52"],
            ["id"=>"2","menu_id"=>1,"customlink"=>"#"               ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 08:47:26","updated_at"=>"2018-05-07 08:47:26"],
            ["id"=>"3","menu_id"=>1,"customlink"=>"/vision"         ,"category_id"=>"0","parent_id"=>"2","hasSubs"=>"0","created_at"=>"2018-05-07 08:48:17","updated_at"=>"2018-05-07 08:48:17"],
            ["id"=>"4","menu_id"=>1,"customlink"=>"/stuff"          ,"category_id"=>"0","parent_id"=>"2","hasSubs"=>"0","created_at"=>"2018-05-07 08:49:08","updated_at"=>"2018-05-07 08:49:08"],
            ["id"=>"5","menu_id"=>1,"customlink"=>"/consult"        ,"category_id"=>"0","parent_id"=>"2","hasSubs"=>"0","created_at"=>"2018-05-07 08:54:14","updated_at"=>"2018-05-07 08:54:14"],
            ["id"=>"6","menu_id"=>1,"customlink"=>"/versions"       ,"category_id"=>"0","parent_id"=>"2","hasSubs"=>"0","created_at"=>"2018-05-07 08:59:41","updated_at"=>"2018-05-07 08:59:41"],
            ["id"=>"7","menu_id"=>1,"customlink"=>"/center"         ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:00:21","updated_at"=>"2018-05-07 09:00:21"],
            ["id"=>"8","menu_id"=>1,"customlink"=>"/magazine"       ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:01:30","updated_at"=>"2018-05-07 09:01:30"],
            ["id"=>"9","menu_id"=>1,"customlink"=>"/academy"        ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:02:31","updated_at"=>"2018-05-07 09:02:31"],
            ["id"=>"10","menu_id"=>1,"customlink"=>"/anual_events"  ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:04:20","updated_at"=>"2018-05-07 09:04:20"],
            ["id"=>"11","menu_id"=>1,"customlink"=>"/forum"         ,"category_id"=>"0","parent_id"=>"10","hasSubs"=>"0","created_at"=>"2018-05-07 09:05:19","updated_at"=>"2018-05-07 09:05:19"],
            ["id"=>"12","menu_id"=>1,"customlink"=>"/conference"    ,"category_id"=>"0","parent_id"=>"10","hasSubs"=>"0","created_at"=>"2018-05-07 09:06:26","updated_at"=>"2018-05-07 09:06:26"],
            ["id"=>"13","menu_id"=>1,"customlink"=>"/parents"       ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:09:21","updated_at"=>"2018-05-07 09:09:21"],
            ["id"=>"14","menu_id"=>1,"customlink"=>"/contact_us"    ,"category_id"=>"0","parent_id"=>"0","hasSubs"=>"0","created_at"=>"2018-05-07 09:10:27","updated_at"=>"2018-05-07 09:10:27"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("menus")->delete();
        DB::table("menu_links")->delete();
    }
}
