<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';
    public $timestamps = false;
    protected $fillable = ['company_name',
                           'position',
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
