<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAllSecTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::dropIfExists('sec_accessright');
          Schema::dropIfExists('sec_role_categories');
          Schema::dropIfExists('sec_roles');
          Schema::dropIfExists('sec_roles_users_relationship');
          Schema::dropIfExists('jobs');
          Schema::dropIfExists('failed_jobs');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
