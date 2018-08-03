<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPubDatePostsAllownull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dateTime('pub_date')->nullable()->change();
            $table->integer('is_published')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('posts', function (Blueprint $table) {
//            $table->dateTime('pub_date')->nullable(false)->change();
//            $table->integer('is_published')->nullable(false)->change();
//
//        });
    }
}
