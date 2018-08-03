<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsThumsOriginalFromMediafiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('media_files', function (Blueprint $table) {
            $table->dropColumn('path_thumb');
            $table->dropColumn('path_orignal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('media_files', function (Blueprint $table) {
            $table->string("path_thumb");
            $table->string("path_orignal");
        });
    }
}
