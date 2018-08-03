<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title");
            $table->text("body");
            $table->datetime("pub_date");
            $table->integer("post_type_id");
            $table->integer('category_id')->nullable();
            $table->boolean("is_published");
            $table->integer("created_by")->nullable();;
            $table->integer("updated_by")->nullable();;
            //$table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
