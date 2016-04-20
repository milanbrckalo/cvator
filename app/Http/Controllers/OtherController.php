<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Request $request)
    {
        if (!empty($request->input('skill')))
        {
            $skill = $request->input('skill');
            $skills = explode(',', $skill);
            
            for ($i = 0; $i < count($skills); $i++)
            {
                $request->user()->skills()->create(['skill' => $skills[$i]]);
            }
        }
        
        if (!empty($request->input('language')))
        {
            $language = $request->input('language');
            $languages = explode(',', $language);
            
            for ($i = 0; $i < count($languages); $i++)
            {
                $request->user()->languages()->create(['language' => $languages[$i]]);
            }
        }
        
        if (!empty($request->input('hobby')))
        {
            $hobby = $request->input('hobby');
            $hobbies = explode(',', $hobby);
            
            for ($i = 0; $i < count($hobbies); $i++)
            {
                $request->user()->hobbies()->create(['hobby' => $hobbies[$i]]);
            }
        }
        
        if (!empty($request->input('personal_description')))
        {
            $request->user()->other()->create(['personal_description' => $request->personal_description]);    
        }
        
        if (!empty($request->input('other_description')))
        {
            $request->user()->other()->create(['other_description' => $request->other_description]);    
        }

        return redirect('/dashboard');
    }
}
