<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('result', function($table) {
	 $table -> increments('result_id');
     $table->integer('id')->length(10)->unsigned();
     $table->timestamps();
		});
	 Schema::table('result', function($table) {
     $table->foreign('id')->references('id')->on('user')->onDelete('cascade');
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
    Schema::drop('result');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    
    }
}
