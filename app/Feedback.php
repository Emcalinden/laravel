<?php

namespace Algorithmaths;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'review';
protected $primaryKey = 'review_id';
protected $fillable = ['review'];

public function user() {
        return $this->belongsTo('Algorithmaths\User');
    }

}
