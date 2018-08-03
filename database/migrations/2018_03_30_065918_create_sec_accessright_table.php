<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecAccessrightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_accessright', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->string('model_name');
            $table->enum('access_type',["view","add","edit","delete"]);
            $table->string('filter')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('update_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sec_accessright');
    }
}
