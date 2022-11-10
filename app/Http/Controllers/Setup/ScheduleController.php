<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\employee;
use App\Models\LCountry;
use App\Models\lDesignation;
use App\Models\lmission;
use App\Models\zone_mapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ScheduleController extends Controller
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
        $mission = lmission::all();
        $data = '';
//        $zone = zone_mapping::where('id',Auth::user()->zoneId)->first();

        return view('backend.setup.schedule',compact('data','mission'));
    }

public function store(Request $request){

    $input = new lmission();
    $input->mission = $request->input('mission');
    $input->status = $request->input('active_yn');

    $input->save();
    return back()->with('success','Mission Successfully Created!');

}

public function edit(Request $request, $id){

        $data = lmission::where('id',$id)->first();
    return view('backend.setup.mission',compact('data'));

}
public function update(Request $request, $id){$input = lmission::find($id);
    $input->mission = $request->input('mission');
    $input->status = $request->input('active_yn');

    $input->update();
    return redirect()->route('mission.index')->with('success','Mission Successfully Updated!');


}

public function datatable(){
        dd('dsad');
}

}
