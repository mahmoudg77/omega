<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPosttypeSettingColumnsToPostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_types', function (Blueprint $table) {
            $table->boolean('has_category')->nullable()->default(0);
            $table->boolean('has_main_file')->nullable()->default(0);
            $table->boolean('has_main_image')->nullable()->default(0);
            $table->boolean('has_files')->nullable()->default(0);
            $table->boolean('has_images')->nullable()->default(0);
            $table->boolean('has_tags')->nullable()->default(0);
        });

        DB::table('post_types')->where('id',1)->update(['has_category'=>0,'has_main_file'=>1,'has_main_image'=>1,'has_files'=>0,'has_images'=>0,'has_tags'=>0]);
        DB::table('post_types')->where('id',2)->update(['has_category'=>1,'has_main_file'=>1,'has_main_image'=>1,'has_files'=>0,'has_images'=>0,'has_tags'=>1]);
        DB::table('post_types')->where('id',3)->update(['has_category'=>1,'has_main_file'=>1,'has_main_image'=>0,'has_files'=>0,'has_images'=>0,'has_tags'=>0]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_types', function (Blueprint $table) {
            $table->dropColumn('has_category');
            $table->dropColumn('has_main_file');
            $table->dropColumn('has_main_image');
            $table->dropColumn('has_files');
            $table->dropColumn('has_images');
            $table->dropColumn('has_tags');
        });
    }
}
