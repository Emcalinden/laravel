<?php

namespace Algorithmaths;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Algorithmaths\Result;

class User extends Model implements Authenticatable 
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';
	protected $primaryKey = 'id';
     protected $hidden = ['password'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'password'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
	 public function getRememberToken()
{
    return $this->remember_token;
}

public function feedback() {
        return $this->hasMany('Algorithmaths\Feedback');
    }

public function getId()
{
  return $this->id;
}

public function result(){
    return $this->hasMany('Algorithmaths\Result');

}
public function setRememberToken($value)
{
    $this->remember_token = $value;
}
public function getRememberTokenName()
{
    return 'remember_token';
}
public function getAuthIdentifier() { return $this->getKey(); }
public function getAuthPassword() { return $this->password; }

public function question () {
        return $this->hasMany('Algorithmaths\Question');
    }

    public function answer () {
        return $this->belongsTo('Algorithmaths\Answer');
    }

}