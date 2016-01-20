<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user', function($table){
	  $table -> increments('id');
	  $table -> string('first_name');
	  $table -> string('last_name');
	  $table -> string('username');
	  $table -> string('password');
	  $table->rememberToken();
	  $table -> timestamps();
	  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::drop('user');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
