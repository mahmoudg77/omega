<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Extra\Functions as Func;
class InsertAdminPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        foreach (Func::controllers() as $ctrl => $value) {
          $arr=[];
          $obj=new $ctrl;
          if(!property_exists($ctrl,'methods')) continue;
          foreach ($obj->methods as $key => $value) {
            $arr[]=['sec_group_id' => '1','controller' => $ctrl,'action'=>$key,'created_by'=>1,'created_at'=>date("Y-m-d H:i:n")];
          }

             DB::table('sec_permissions')->insert($arr);
           // DB::table('sec_permissions')->insert([
          //   ['sec_group_id' => '1','controller' => $ctrl,'action'=>'index','created_by'=>1,'created_at'=>date("Y-m-d H:i:n")],
          //   ['sec_group_id' => '1','controller' => $ctrl,'action'=>'create','created_by'=>1,'created_at'=>date("Y-m-d H:i:n")],
          //   ['sec_group_id' => '1','controller' => $ctrl,'action'=>'edit','created_by'=>1,'created_at'=>date("Y-m-d H:i:n")],
          //   ['sec_group_id' => '1','controller' => $ctrl,'action'=>'show','created_by'=>1,'created_at'=>date("Y-m-d H:i:n")],
          //   ['sec_group_id' => '1','controller' => $ctrl,'action'=>'destroy','created_by'=>1,'created_at'=>date("Y-m-d H:i:n")],
          // ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::table('sec_permissions')->where('sec_group_id',1)->delete();
    }
}
