<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslationMenuLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('menu_links', function (Blueprint $table) {
            $table->dropColumn('title');
        });
        Schema::create('menu_link_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_link_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['menu_link_id','locale']);
            $table->foreign('menu_link_id')->references('id')->on('menu_links')->onDelete('cascade');
            $table->string('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('menu_links', function (Blueprint $table) {
            $table->string('title');
        });
        Schema::drop('menu_link_translations');
    }
}
