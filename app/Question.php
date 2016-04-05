<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;



class Question extends Model
{
protected $table = 'question';
protected $primaryKey = 'question_id';
protected $fillable = ['question'];

public function answer() {
        return $this->hasMany('Algorithmaths\Answer');
    }

    public function test() {
        return $this->hasMany('Algorithmaths\Test');
    }
    public function userResult(){
    	return $this->belongsToMany('Algorithmaths\UserAnswer','question_id');
    }

}
