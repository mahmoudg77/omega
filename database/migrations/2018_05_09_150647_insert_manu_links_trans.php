<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertManuLinksTrans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menu_link_translations = array(
            array('id' => '1','menu_link_id' => '1','locale' => 'ar','title' => 'الرئيسية'),
            array('id' => '2','menu_link_id' => '1','locale' => 'en','title' => 'Home'),
            array('id' => '3','menu_link_id' => '2','locale' => 'ar','title' => 'من نحن؟'),
            array('id' => '4','menu_link_id' => '2','locale' => 'en','title' => 'About us?'),
            array('id' => '5','menu_link_id' => '3','locale' => 'ar','title' => 'الرؤية والإهداف'),
            array('id' => '6','menu_link_id' => '3','locale' => 'en','title' => 'Vision'),
            array('id' => '7','menu_link_id' => '4','locale' => 'ar','title' => 'مجلس الامناء'),
            array('id' => '8','menu_link_id' => '4','locale' => 'en','title' => 'Stuff'),
            array('id' => '9','menu_link_id' => '5','locale' => 'ar','title' => 'المجلس الاستشارى'),
            array('id' => '10','menu_link_id' => '5','locale' => 'en','title' => 'Consult'),
            array('id' => '11','menu_link_id' => '6','locale' => 'ar','title' => 'اصداراتنا'),
            array('id' => '12','menu_link_id' => '6','locale' => 'en','title' => 'Our Versions'),
            array('id' => '13','menu_link_id' => '7','locale' => 'ar','title' => 'المركز'),
            array('id' => '14','menu_link_id' => '7','locale' => 'en','title' => 'Center'),
            array('id' => '15','menu_link_id' => '8','locale' => 'ar','title' => 'المجلة'),
            array('id' => '16','menu_link_id' => '8','locale' => 'en','title' => 'Magazine'),
            array('id' => '17','menu_link_id' => '9','locale' => 'ar','title' => 'الأكاديمية'),
            array('id' => '18','menu_link_id' => '9','locale' => 'en','title' => 'Academy'),
            array('id' => '19','menu_link_id' => '10','locale' => 'ar','title' => 'الفعاليات السنوية'),
            array('id' => '20','menu_link_id' => '10','locale' => 'en','title' => 'Anual Events'),
            array('id' => '21','menu_link_id' => '11','locale' => 'ar','title' => 'المنتدى'),
            array('id' => '22','menu_link_id' => '11','locale' => 'en','title' => 'Forum'),
            array('id' => '23','menu_link_id' => '12','locale' => 'ar','title' => 'المؤتمر'),
            array('id' => '24','menu_link_id' => '12','locale' => 'en','title' => 'Conference'),
            array('id' => '25','menu_link_id' => '13','locale' => 'ar','title' => 'الاباء والامهات'),
            array('id' => '26','menu_link_id' => '13','locale' => 'en','title' => 'Parents'),
            array('id' => '27','menu_link_id' => '14','locale' => 'ar','title' => 'اتصل بنا'),
            array('id' => '28','menu_link_id' => '14','locale' => 'en','title' => 'Contact us')
        );
        DB::table('menu_link_translations')->delete();
        DB::table('menu_link_translations')->insert($menu_link_translations);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('menu_link_translations')->delete();
    }
}
