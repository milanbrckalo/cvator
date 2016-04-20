<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Vsmoraes\Pdf\Pdf;
use App\Basic;
use App\Education;
use App\Experience;
use App\Skill;
use App\Language;
use App\Hobby;
use App\Other;
use DB;

class CvController extends Controller
{
    private $pdf;

    public function __construct(Pdf $pdf)
    {
        $this->middleware('auth');
        $this->pdf = $pdf; 
    }
    
    public function index(Request $request)
    {
        $basic = Basic::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get(); 
        $education = Education::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $experience = Experience::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $skill = Skill::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $language = Language::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $hobby = Hobby::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $other = Other::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        
        $username = $request->user()->username;
        
        $html = view('cv', ['basic' => $basic, 
                            'education' => $education, 
                            'experience' => $experience,
                            'skill' => $skill,
                            'language' => $language,
                            'hobby' => $hobby,
                            'other' => $other,
                            'avatar' => $username,
                           
        ])->render();
        
        return $this->pdf
                    ->load($html)
                    ->show();
    }
    
    public function destroy(Request $request)
    {
        DB::table('basic')->where('user_id', $request->user()->id)->delete();
        DB::table('education')->where('user_id', $request->user()->id)->delete();
        DB::table('experience')->where('user_id', $request->user()->id)->delete();
        DB::table('skills')->where('user_id', $request->user()->id)->delete();
        DB::table('languages')->where('user_id', $request->user()->id)->delete();
        DB::table('hobbies')->where('user_id', $request->user()->id)->delete();
        DB::table('other')->where('user_id', $request->user()->id)->delete();
        
        $username = $request->user()->username;
        $avatar = base_path().'/public/avatar/'.$username.'.jpg';
        $avatar2 = base_path().'/public/avatar/'.$username.'.jpeg';    
        
        if (file_exists($avatar))
        {
            unlink($avatar);
            
            return redirect('/dashboard');    
        }
        elseif (file_exists($avatar2))
        {
           unlink($avatar);
           
           return redirect('/dashboard');
        }
        else
        {
            return redirect('/dashboard');
        }
    }
}
