<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertFooterMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("menus")->insert([
            "id"=>2,"name"=>"Footer Menu","location"=>"footer","created_at"=>"2018-05-15 15:30:20","updated_at"=>"2018-05-15 15:30:20"
        ]);
        $menu_links = array(
            array('id' => '16','menu_id' => '2','customlink' => '/events','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-14 08:17:50','updated_at' => '2018-05-14 08:17:50'),
            array('id' => '17','menu_id' => '2','customlink' => '/article','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-14 08:18:45','updated_at' => '2018-05-14 08:18:45'),
            array('id' => '18','menu_id' => '2','customlink' => '/versions','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-14 08:19:49','updated_at' => '2018-05-14 08:19:49'),
            array('id' => '19','menu_id' => '2','customlink' => '/contact_us','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-14 08:20:37','updated_at' => '2018-05-14 08:20:37')
        );
        DB::table("menu_links")->insert($menu_links);
        $menu_link_translations = array(
            array('id' => '31','menu_link_id' => '16','locale' => 'ar','title' => 'الدورات'),
            array('id' => '32','menu_link_id' => '16','locale' => 'en','title' => 'Events'),
            array('id' => '33','menu_link_id' => '17','locale' => 'ar','title' => 'المقالات'),
            array('id' => '34','menu_link_id' => '17','locale' => 'en','title' => 'Articles'),
            array('id' => '35','menu_link_id' => '18','locale' => 'ar','title' => 'اصداراتنا'),
            array('id' => '36','menu_link_id' => '18','locale' => 'en','title' => 'Oure Versions'),
            array('id' => '37','menu_link_id' => '19','locale' => 'ar','title' => 'اتصل بنا'),
            array('id' => '38','menu_link_id' => '19','locale' => 'en','title' => 'Contact us')
        );
        DB::table("menu_link_translations")->insert($menu_link_translations);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
