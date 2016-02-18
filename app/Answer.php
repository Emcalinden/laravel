<?php

namespace Algorithmaths;
use Algorithmaths\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer'; // or whatever your table is
    protected $primaryKey = 'answer_id';

    public function question()
    {
        return $this->hasOne('Algorithmaths\Question', 'question_id');
    }
}
