<?php

namespace App\Http\Controllers;

use App\Models\country;
use App\Models\LAppoinmentType;
use App\Models\LCountry;
use App\Models\lmission;
use App\Models\lSubConsular;
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
        $consulateType = lSubConsular::all();
        return view('frontend.mission.index',compact('country','apptype','consulateType'));
    }
 public function tracking(Request $request)
    {
        $country = country::all();
        $apptype =LAppoinmentType::all();
        $consulateType = lSubConsular::all();
        return view('frontend.tracking',compact('country','apptype','consulateType'));
    }
    public function contact(Request $request)
    {
        return view('frontend.contact');
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

