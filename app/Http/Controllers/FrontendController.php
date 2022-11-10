<?php

namespace App\Http\Controllers;

use App\Models\country;
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
        $country = country::all();
        $apptype =LAppoinmentType::all();
        return view('frontend.mission.index',compact('country','apptype'));
    }

    public function getmissionAjax(Request $request){

        $data = lmission::where('country_id',$request->country_id)->get();

        return response()->json($data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}

