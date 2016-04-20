<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {        
        $request->user()->experience()->create(['company_name' => $request->company_name,
                                                'position' => $request->position,
                                                'duration' => $request->duration,
                                                'city' => $request->city,
                                                'country' => $request->country,
                                                'comment' => $request->comment,
        
        ]);

        return redirect('/dashboard');        
    }
}
