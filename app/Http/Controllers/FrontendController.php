<?php

namespace App\Http\Controllers;

use App\Models\country_;
use App\Models\LAppoinmentType;
use App\Models\LCountry;
use App\Models\lmission;
use App\Models\zone_mapping;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $mission = lmission::all();
        $country = LCountry::all();
        $apptype =LAppoinmentType::all();
        return view('frontend.mission.index',compact('mission','country','apptype'));
    }

    public function getCountryAjax(Request $request){

        $data = country::where('missionId',$request->mission_id)->get();

        return response()->json($data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}

