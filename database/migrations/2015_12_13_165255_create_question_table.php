<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('question', function($table) {  
	 $table -> increments('question_id');
     $table -> string('question');
	 $table-> string('difficulty');
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
	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::drop('question');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
