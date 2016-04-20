<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {        
        $request->user()->education()->create(['school_name' => $request->school_name,
                                               'area_of_study' => $request->area_of_study,
                                               'duration' => $request->duration,
                                               'city' => $request->city,
                                               'country' => $request->country,
                                               'comment' => $request->comment,
        
        ]);

        return redirect('/dashboard');        
    }
}
