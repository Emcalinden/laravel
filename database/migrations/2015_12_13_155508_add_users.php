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
		'password' => 'pa$$word',
		'created_at' => date('Y-m-d H:m:s'),
		'updated_at' => date('Y-m-d H:m:s')
		));
		DB::table('user')->insert(array(
		'first_name' => 'Glenn',
		'last_name' => 'Hawe',
		'username' => 'ghawe',
		'password' => 'supervisor',
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
