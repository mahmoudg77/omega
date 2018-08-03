<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSetingTranslationDefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $setting_translations = array(
            array('id' => '1','setting_id' => '1','locale' => 'ar','value' => 'المرسسة العلمية لتربية الطفولة المبكرة'),
            array('id' => '2','setting_id' => '1','locale' => 'en','value' => 'SFECE'),
            array('id' => '7','setting_id' => '16','locale' => 'ar','value' => '123456789'),
            array('id' => '8','setting_id' => '16','locale' => 'en','value' => '987654321'),
            array('id' => '9','setting_id' => '15','locale' => 'ar','value' => '123456'),
            array('id' => '10','setting_id' => '15','locale' => 'en','value' => '654321'),
            array('id' => '11','setting_id' => '14','locale' => 'ar','value' => NULL),
            array('id' => '12','setting_id' => '14','locale' => 'en','value' => NULL),
            array('id' => '13','setting_id' => '13','locale' => 'ar','value' => NULL),
            array('id' => '14','setting_id' => '13','locale' => 'en','value' => NULL),
            array('id' => '15','setting_id' => '12','locale' => 'ar','value' => NULL),
            array('id' => '16','setting_id' => '12','locale' => 'en','value' => NULL),
            array('id' => '17','setting_id' => '11','locale' => 'ar','value' => NULL),
            array('id' => '18','setting_id' => '11','locale' => 'en','value' => NULL),
            array('id' => '19','setting_id' => '10','locale' => 'ar','value' => NULL),
            array('id' => '20','setting_id' => '10','locale' => 'en','value' => NULL),
            array('id' => '21','setting_id' => '9','locale' => 'ar','value' => NULL),
            array('id' => '22','setting_id' => '9','locale' => 'en','value' => NULL),
            array('id' => '23','setting_id' => '8','locale' => 'ar','value' => 'SFECE,الطفولة المبكرة,استشارات,مؤسسة،تربية،اولياء الامور'),
            array('id' => '24','setting_id' => '8','locale' => 'en','value' => 'SFECE,الطفولة المبكرة,استشارات,مؤسسة،تربية،اولياء الامور'),
            array('id' => '25','setting_id' => '7','locale' => 'ar','value' => 'هدف الموقع إلى تثقيف وتقديم الاستشارات إلى أولياء الأمور والمعلمات والمختصين في مجال تربية الطفولة المبكرة،لتربية شخصية الطفل وبناء مهارات الدماغ ودعم نمو الطفل وتعلمه وفق معاييرالتعلم التربية العالمية'),
            array('id' => '26','setting_id' => '7','locale' => 'en','value' => 'هدف الموقع إلى تثقيف وتقديم الاستشارات إلى أولياء الأمور والمعلمات والمختصين في مجال تربية الطفولة المبكرة،لتربية شخصية الطفل وبناء مهارات الدماغ ودعم نمو الطفل وتعلمه وفق معاييرالتعلم التربية العالمية'),
            array('id' => '27','setting_id' => '6','locale' => 'ar','value' => 'en'),
            array('id' => '28','setting_id' => '6','locale' => 'en','value' => 'en'),
            array('id' => '29','setting_id' => '5','locale' => 'ar','value' => 'Yes'),
            array('id' => '30','setting_id' => '5','locale' => 'en','value' => 'Yes'),
            array('id' => '31','setting_id' => '4','locale' => 'ar','value' => NULL),
            array('id' => '32','setting_id' => '4','locale' => 'en','value' => NULL),
            array('id' => '33','setting_id' => '3','locale' => 'ar','value' => 'no-replay@isdegypt.com'),
            array('id' => '34','setting_id' => '3','locale' => 'en','value' => 'no-replay@isdegypt.com'),
            array('id' => '35','setting_id' => '2','locale' => 'ar','value' => 'info@isdegypt.com'),
            array('id' => '36','setting_id' => '2','locale' => 'en','value' => 'info@isdegypt.com')
        );
      DB::table('setting_translations')->insert($setting_translations);
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
