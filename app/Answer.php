<?php

namespace Algorithmaths;
use Algorithmaths\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer'; // or whatever your table is
    protected $primaryKey = 'answer_id';
     protected $fillable = ['question_id'];

    public function question()
    {
        return $this->belongsTo('Algorithmaths\Question','question_id')->distinct();
    }

    public function userResult()
    {
    	return $this->belongsToMany('Algorithmaths\UserAnswer','answer_id');
    }

}
