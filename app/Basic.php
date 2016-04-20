<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $table = 'basic';
    public $timestamps = false;
    protected $fillable = ['full_name',
                           'date_of_birth',
                           'address',
                           'postal_code',
                           'city',
                           'country',
                           'phone_number',
                           'email',
                           'website',
                           
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
