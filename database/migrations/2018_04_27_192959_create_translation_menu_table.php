<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->dropColumn('name');
        });
        Schema::create('menu_translations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('menu_id')->unsigned();
          $table->string('locale')->index();
          $table->unique(['menu_id','locale']);
          $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
          $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            //
            $table->string('name');
        });
        Schema::drop('menu_translations');
    }
}
