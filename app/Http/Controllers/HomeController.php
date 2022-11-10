<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 1){
            $totaluser = DB::SelectOne("SELECT COUNT(users.id) as users FROM users ");
            $mission = DB::SelectOne("SELECT COUNT(lmission.id) as mission FROM lmission ");
            $country = DB::SelectOne("SELECT COUNT(country.id) as country FROM country ");

        }else{
            $totaluser = DB::SelectOne("SELECT COUNT(users.id) as users FROM users join lmission on lmission.id = users.mission_id WHERE users.mission_id = $user->mission_id  "); ;
            $mission = '';
            $country = '';
            $zone = '';
        }

        return view('backend.home',compact('user','mission','country','totaluser'));
    }

}
