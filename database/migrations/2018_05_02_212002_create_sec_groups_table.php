<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_groups', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('groupkey');
          $table->timestamps();
        });
        DB::table('sec_groups')->insert(
            [
              ['id'=>1,'name' => 'admin','groupkey' => 'admin','created_at'=>date("Y-m-d H:i:n")],
              ['id'=>2,'name' => 'subscribe','groupkey' => 'subscribe','created_at'=>date("Y-m-d H:i:n")],
              ['id'=>3,'name' => 'premium','groupkey' => 'premium','created_at'=>date("Y-m-d H:i:n")],
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
        Schema::drop('sec_groups');
    }
}
