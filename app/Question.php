<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
protected $table = 'questions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','question'];
 public function user () {
     return $this->belongsTo('Algorithmaths\User');
 }

}
