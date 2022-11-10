<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\country;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\lmission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MissionController extends Controller
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
        $country = country::all();
        return view('backend.setup.mission', compact('country'));
    }

    public function store(Request $request)
    {

        $input = new lmission();
        $input->country_id = $request->input('country_id');
        $input->mission = $request->input('mission');
        $input->status = $request->input('active_yn');

        $input->save();
        return back()->with('success', 'Mission Successfully Created!');

    }


    public function edit(Request $request, $id)
    {

        $data = lmission::where('id', $id)->first();
        $country = country::all();
        return view('backend.setup.mission', compact('data', 'country'));

    }

    public function update(Request $request, $id)
    {
        $input = lmission::find($id);
        $input->country_id = $request->input('country_id');
        $input->mission = $request->input('mission');
        $input->status = $request->input('active_yn');

        $input->update();
        return redirect()->route('mission.index')->with('success', 'Mission Successfully Updated!');


    }


    public function datatable()
    {

        $data = lmission::leftjoin('country', 'country.id','=','lmission.country_id')
        ->select('lmission.*','country.country')->get();

        return datatables()->of($data)
            ->editColumn('status', function ($query) {
                if ($query->status == 'Y') {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            })
            ->editColumn('action', function ($query) {
//                return 'Work in Progerss';
                return '<a href="' . route('mission.edit', $query->id) . '" class=""><button class="btn btn-primary">Edit</button></i></a> || <a href="' . route('mission.destroy', $query->id) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Mission?\')"><button class="btn btn-danger">Delete</button></i></a>';
            })
            ->addIndexColumn()
            ->make();
    }


    public function destroy($id)
    {

        DB::delete('delete from lmission where id = ?', [$id]);
        return redirect()->route('mission.index')->with('success', 'Mission Successfully Deleted!');

    }
}
