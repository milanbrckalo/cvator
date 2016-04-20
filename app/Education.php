<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    public $timestamps = false;
    protected $fillable = ['school_name',
                           'area_of_study',
                           'duration',
                           'city',
                           'country',
                           'comment',
                           
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
