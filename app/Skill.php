<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    public $timestamps = false;
    protected $fillable = ['skill'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
