<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $categories = array(
            array('id' => '2','created_by' => NULL,'updated_by' => NULL,'parent_id' => NULL,'ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:09:31','updated_at' => '2018-05-12 16:48:34','slug' => 'magazen'),
            array('id' => '3','created_by' => NULL,'updated_by' => NULL,'parent_id' => '2','ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:10:28','updated_at' => '2018-05-11 13:10:28','slug' => 'magazen_1'),
            array('id' => '4','created_by' => NULL,'updated_by' => NULL,'parent_id' => '2','ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:13:34','updated_at' => '2018-05-11 13:13:34','slug' => 'magazen_3'),
            array('id' => '5','created_by' => NULL,'updated_by' => NULL,'parent_id' => NULL,'ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:41:03','updated_at' => '2018-05-11 13:41:03','slug' => 'annual_events'),
            array('id' => '6','created_by' => NULL,'updated_by' => NULL,'parent_id' => '5','ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:43:51','updated_at' => '2018-05-11 13:43:51','slug' => 'forum'),
            array('id' => '7','created_by' => NULL,'updated_by' => NULL,'parent_id' => '5','ordering' => '0','deleted_at' => NULL,'created_at' => '2018-05-11 13:44:59','updated_at' => '2018-05-11 13:44:59','slug' => 'conference')
        );

        $category_translations = array(
            array('id' => '3','category_id' => '2','locale' => 'ar','title' => 'المجلات التعليمية','description' => 'المجلات التعليمية'),
            array('id' => '4','category_id' => '2','locale' => 'en','title' => 'Magazen','description' => 'Magazen'),
            array('id' => '5','category_id' => '3','locale' => 'ar','title' => 'مجلة 1','description' => 'مجلة 1'),
            array('id' => '6','category_id' => '3','locale' => 'en','title' => 'Magazen 1','description' => 'Magazine 1'),
            array('id' => '7','category_id' => '4','locale' => 'ar','title' => 'مجلة 2','description' => 'مجلة 2'),
            array('id' => '8','category_id' => '4','locale' => 'en','title' => 'Magazen 2','description' => 'Magazine 2'),
            array('id' => '9','category_id' => '5','locale' => 'ar','title' => 'الفعاليات السنوية','description' => 'الفعاليات السنوية'),
            array('id' => '10','category_id' => '5','locale' => 'en','title' => 'Annual Events','description' => 'Annual Events'),
            array('id' => '11','category_id' => '6','locale' => 'ar','title' => 'المنتديات','description' => 'المنتديات'),
            array('id' => '12','category_id' => '6','locale' => 'en','title' => 'Forum','description' => 'Forum'),
            array('id' => '13','category_id' => '7','locale' => 'ar','title' => 'المؤتمرات','description' => 'Conference'),
            array('id' => '14','category_id' => '7','locale' => 'en','title' => 'Conference','description' => 'Conference')
        );
        DB::table("categories")->delete();
        DB::table("category_translations")->delete();
        DB::table("categories")->insert($categories);
        DB::table("category_translations")->insert($category_translations);
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
