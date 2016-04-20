<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    protected $table = 'other';
    public $timestamps = false;
    protected $fillable = ['personal_description',
                           'other_description',
                           
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
