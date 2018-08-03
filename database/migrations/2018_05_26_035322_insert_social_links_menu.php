<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSocialLinksMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menus = array(
            array('id' => '3','location' => 'header-social','created_at' => '2018-05-25 19:59:19','updated_at' => '2018-05-25 20:09:49','name' => 'Social')
        );
        $menu_links = array(
            array('id' => '20','menu_id' => '3','customlink' => 'https://www.facebook.com/matar.page/?hc_ref=ARRUfqkcKA5FiF8umx96e8ojBjSxvNzsMlginADfQ2SvByaKT6XXIWE_6vOdSLXswz0&fref=nf','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-25 20:01:02','updated_at' => '2018-05-25 20:01:02'),
            array('id' => '21','menu_id' => '3','customlink' => 'https://twitter.com/','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-25 20:11:58','updated_at' => '2018-05-25 20:11:58'),
            array('id' => '22','menu_id' => '3','customlink' => 'https://youtube.com','category_id' => NULL,'parent_id' => NULL,'hasSubs' => '0','created_at' => '2018-05-25 20:13:25','updated_at' => '2018-05-25 20:13:25')
        );
        $menu_link_translations = array(
            array('id' => '39','menu_link_id' => '20','locale' => 'ar','title' => '<i class="fa fa-facebook-square fa-lg"></i>'),
            array('id' => '40','menu_link_id' => '20','locale' => 'en','title' => '<i class="fa fa-facebook-square fa-lg"></i>'),
            array('id' => '41','menu_link_id' => '21','locale' => 'ar','title' => '<i class="fa fa-twitter-square fa-lg"></i>'),
            array('id' => '42','menu_link_id' => '21','locale' => 'en','title' => '<i class="fa fa-twitter-square fa-lg"></i>'),
            array('id' => '43','menu_link_id' => '22','locale' => 'ar','title' => '<i class="fa fa-youtube-square fa-lg"></i>'),
            array('id' => '44','menu_link_id' => '22','locale' => 'en','title' => '<i class="fa fa-youtube-square fa-lg"></i>')
        );

        DB::table('menus')->where('location','header-social')->orWhere('id',3)->delete();
        DB::table('menus')->insert($menus);
        DB::table('menu_links')->insert($menu_links);
        DB::table('menu_link_translations')->insert($menu_link_translations);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menus')->where('location','header-social')->orWhere('id',3)->delete();

    }
}
