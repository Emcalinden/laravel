<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('user')->insert(array(
		'first_name' => 'Emma',
		'last_name' => 'McAlinden',
		'username' => 'emcalinden',
		'password' => Hash::make('emmaPass'),
		'created_at' => date('Y-m-d H:m:s'),
		'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('user')->insert(array(
		'first_name' => 'Jimmy',
		'last_name' => 'John',
		'username' => 'JJohn',
		'password' => Hash::make('JimmyPass'),
		'created_at' => date('Y-m-d H:m:s'),
		'updated_at' => date('Y-m-d H:m:s')
		));
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('user') ->where('username', '=', 'emcalinden')->delete();
		DB::table('user') ->where('username', '=', 'ghawe')->delete();

    }
}
