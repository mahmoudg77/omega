<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSettingDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $setting = array(
            array('id' => '1','name' => 'Site name','hint' => 'Title of your website','key' => 'site_name','type' => '1','availables' => '','group' => 'General'),
            array('id' => '2','name' => 'Default email البريد الإلفتراضي ','hint' => 'Website email you can use any place','key' => 'emails_default','type' => '1','availables' => '','group' => 'General'),
            array('id' => '3','name' => 'No-replay email بريد الإشعارات','hint' => 'This email for message you not follow up it\'s response ','key' => 'emails_noreplay','type' => '1','availables' => '','group' => 'General'),
            array('id' => '4','name' => 'Max image size (KB)','hint' => '','key' => 'max_image_size','type' => '1','availables' => '','group' => 'Posts'),
            array('id' => '5','name' => 'Allow register','hint' => '','key' => 'allow_like','type' => '3','availables' => '','group' => 'General'),
            array('id' => '6','name' => 'Default language لغة الموقع','hint' => '','key' => 'site_lang','type' => '4','availables' => '{shortcut as id ,name from languages}','group' => 'General'),
            array('id' => '7','name' => 'Site Description','hint' => 'Description of your website','key' => 'site_desc','type' => '1','availables' => '','group' => 'General'),
            array('id' => '8','name' => 'Site Keaywords','hint' => 'Keaywords of your website','key' => 'site_key','type' => '1','availables' => '','group' => 'General'),
            array('id' => '9','name' => 'Site Image لوجو الموقع','hint' => 'Image of your website','key' => 'site_image','type' => '1','availables' => '','group' => 'General'),
            array('id' => '10','name' => 'Facebook فيسبوك','hint' => 'facebook','key' => 'facebook','type' => '1','availables' => '','group' => 'General'),
            array('id' => '11','name' => 'Twitter تويتر','hint' => 'twitter','key' => 'twitter','type' => '1','availables' => '','group' => 'General'),
            array('id' => '12','name' => 'Youtube يوتيوب','hint' => 'youtube','key' => 'youtube','type' => '1','availables' => '','group' => 'General'),
            array('id' => '13','name' => 'Instagram انستجرام','hint' => 'Instagram','key' => 'instagram','type' => '1','availables' => '','group' => 'General'),
            array('id' => '14','name' => 'Address','hint' => 'Address','key' => 'site_address','type' => '1','availables' => '','group' => 'General'),
            array('id' => '15','name' => 'phone','hint' => 'phone','key' => 'site_phone','type' => '1','availables' => '','group' => 'General'),
            array('id' => '16','name' => 'Fax','hint' => 'Fax','key' => 'site_fax','type' => '1','availables' => '','group' => 'General'),
        );

        DB::table('settings')->insert($setting);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('settings')->delete();
    }
}
