<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Education;
use App\Experience;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $education = Education::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();
        $experience = Experience::where('user_id', $request->user()->id)->orderBy('id', 'desc')->get();

        return view('home', ['education' => $education, 'experience' => $experience]);
    }
}
