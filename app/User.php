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
    
    protected $fillable = ['first_name','last_name','username', 'password'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function userAnswer() {
        return $this->belongsToMany('Algorithmaths\UserAnswer','user_id');
    }
	 public function getRememberToken()
     {
        return $this->remember_token;
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
}