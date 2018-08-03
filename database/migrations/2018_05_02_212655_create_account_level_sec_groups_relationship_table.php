<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountLevelSecGroupsRelationshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_levels_sec_groups_relationship', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_level_id');
            $table->integer('sec_group_id');
            $table->timestamps();
        });
        DB::table('account_levels_sec_groups_relationship')->insert(
            [
              ['id'=>1,'account_level_id' => 1,'sec_group_id'=>1,'created_at'=>date("Y-m-d H:i:n")],
              ['id'=>2,'account_level_id' =>2,'sec_group_id'=>2,'created_at'=>date("Y-m-d H:i:n")],
              ['id'=>3,'account_level_id' =>3,'sec_group_id'=>2,'created_at'=>date("Y-m-d H:i:n")],
              ['id'=>4,'account_level_id' =>3,'sec_group_id'=>3,'created_at'=>date("Y-m-d H:i:n")],
            ]
          );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sec_groups_users_relationship');
    }
}
