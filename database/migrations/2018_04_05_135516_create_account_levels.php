<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountLevels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("role");
            $table->timestamps();
        });
        DB::table('account_levels')->insert(
            [
              ['id'=>1,'name' =>'مدير','role'=>'admin'],
              ['id'=>2,'name' => 'عضو موقع ','role'=>'subscribe'],
              ['id'=>3,'name' => 'عضوية الأسرة','role'=>'subscribe,premium'],
              ['id'=>4,'name' => 'عضوية الطلاب' ,'role'=>'subscribe,premium'],
              ['id'=>5,'name' => 'عضوية نظامية' ,'role'=>'subscribe,premium'],
              ['id'=>6,'name' => 'عضوية شاملة' ,'role'=>'subscribe,premium'],
              ['id'=>7,'name' => 'عضوية شرفية' ,'role'=>'subscribe,premium'],
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
        Schema::dropIfExists('account_levels');
    }
}
