<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediafiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path_thumb');
            $table->string('path_orignal');
            $table->float('size');
            $table->string('media_type');
            $table->string('model_name');
            $table->integer('model_id');
            $table->string('model_attribute');
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
        Schema::dropIfExists('mediafiles');
    }
}
