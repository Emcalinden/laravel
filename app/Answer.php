<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answer'; // or whatever your table is

    public function question()
    {
        return $this->belongsTo('Question');
    }
}
