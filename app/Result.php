<?php

namespace Algorithmaths;
use Algorithmaths\User;


use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
 protected $table = 'result';
protected $primaryKey = 'result_id';
protected $fillable = ['result','user_id'];


public function user(){
    return $this->belongsTo('Algorithmaths\User');

}
public function test(){
    return $this->hasMany('Algorithmaths\Test');

}

}
