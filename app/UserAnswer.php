<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Algorithmaths\Result;
use Algorithmaths\User;
use Algorithmaths\Question;


class UserAnswer extends Model
{
protected $table = 'user_answer';
protected $primaryKey = 'user_answer_id';

public function user() {
      	return $this->belongsTo('Algorithmaths\User','id');
    }
    public function answer() {
        return $this->hasMany('Algorithmaths\Answer');
    }
}
