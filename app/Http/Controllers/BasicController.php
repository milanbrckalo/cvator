<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BasicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {      
        $request->user()->basic()->create(['full_name' => $request->full_name,
                                           'date_of_birth' => $request->date_of_birth,
                                           'address' => $request->address,
                                           'postal_code' => $request->postal_code,
                                           'city' => $request->city,
                                           'country' => $request->country,
                                           'phone_number' => $request->phone_number,
                                           'email' => $request->email,
                                           'website' => $request->website,
        
        ]);
        
        if (!empty($request->file('avatar'))) 
        {
            $username = $request->user()->username;
            $file = $username.'.'.$request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(base_path().'/public/avatar/', $file);
        }
        
        return redirect('/dashboard');
    }
}
