<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertSubscribeAccountPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    $this->down();
        $sec_permissions = array(
            array('id' => '175','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\DashboardController','action' => 'index','created_by' => '2','created_at' => '2018-05-16 12:58:05','updated_at' => NULL,'force_filter' => NULL),
            array('id' => '176','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\FileController','action' => 'getFile','created_by' => '2','created_at' => '2018-05-17 15:37:05','updated_at' => NULL,'force_filter' => NULL),
            array('id' => '177','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'index','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]'),
            array('id' => '178','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'show','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]'),
            array('id' => '179','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'edit','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]'),
            array('id' => '180','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'create','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]'),
            array('id' => '181','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'destroy','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]'),
            array('id' => '182','sec_group_id' => '2','controller' => 'App\\Http\\Controllers\\Dashboard\\PostController','action' => 'getFreeSlug','created_by' => '2','created_at' => '2018-05-17 21:21:05','updated_at' => NULL,'force_filter' => '[["post_type_id","=","3"]]')
        );
        DB::table('sec_permissions')->insert($sec_permissions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('sec_permissions')->whereIn('id',[175,176,177,178,179,180,181,182])->delete();


    }
}
