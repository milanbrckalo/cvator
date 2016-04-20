<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function basic()
    {
        return $this->hasOne(Basic::class);
    }
    
    public function education()
    {
        return $this->hasMany(Education::class);
    }
    
    public function experience()
    {
        return $this->hasMany(Experience::class);
    }
    
    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
    
    public function languages()
    {
        return $this->hasMany(Language::class);
    }
    
    public function hobbies()
    {
        return $this->hasMany(Hobby::class);
    }
    
    public function other()
    {
        return $this->hasOne(Other::class);
    }
}
