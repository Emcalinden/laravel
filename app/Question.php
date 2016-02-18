<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
protected $table = 'question';
protected $primaryKey = 'question_id';
  

  protected $fillable = ['question'];

public function answer() {
        return $this->belongsToMany('Algorithmaths\Answer','answer_id');
    }

}
