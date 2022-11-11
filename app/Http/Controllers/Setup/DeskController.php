<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\country_mapping;
use App\Models\employee;
use App\Models\LAppoinmentType;
use App\Models\LCountry;
use App\Models\lDesignation;
use App\Models\lmission;
use App\Models\User;
use App\Models\zone_mapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class DeskController extends Controller
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

    public function index()
    {
        $data='';
        $user=User::leftjoin('lmission','lmission.id','users.mission_id')->where('lmission.id',Auth::user()->mission_id)
            ->select('users.*', 'lmission.mission')->get();

        $appoimentType = LAppoinmentType::all();
        $mission = lmission::all();
        return view('backend.setup.deskAssign',compact('mission','data','appoimentType','user'));
    }

    public function getCountryAjax(Request $request){
        $data = country_mapping::where('missionId',$request->mission_id)->get();

        return response()->json($data);
    }

    public function getZoneAjax(Request $request){
//        dd($request);
        $data = zone_mapping::where('countryId',$request->country_id)->get();

        return response()->json($data);
    }
public function store(Request $request){


    $input = new zone_mapping();
    $input->missionId = $request->input('mission_id');
    $input->countryId = $request->input('country_id');
    $input->zone = $request->input('zone');
    $input->status = $request->input('active_yn');
    $input->save();
    return back()->with('success','Zone Successfully Created!');

}

    public function edit(Request $request, $id){
        $mission = lmission::all();
        $data = zone_mapping::where('id',$id)->first();
        $country = country_mapping::where('missionId',$data->missionId)->get();

        return view('backend.setup.Zone',compact('data','mission','country'));

    }
    public function update(Request $request, $id)
    {

        $input = zone_mapping::find($id);
        $input->missionId = $request->input('mission_id');
        $input->countryId = $request->input('country_id');
        $input->zone = $request->input('zone');
        $input->status = $request->input('active_yn');

        $input->update();
        return redirect()->route('zone.index')->with('success','Zone Successfully Updated!');


    }

public function datatable(){
        dd('dsad');
}

}
