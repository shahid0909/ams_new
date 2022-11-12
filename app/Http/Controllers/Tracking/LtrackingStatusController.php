<?php


namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use App\Models\lTrackingStatus;
use App\Models\lTrackingType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LtrackingStatusController extends Controller
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
        $data = '';
        return view('backend.tracking.tracking_status', compact('data'));
    }

    public function store(Request $request)
    {
        $input = new lTrackingStatus();
        $input->tracking_status = $request->input('tr_status');
        $input->save();
        return back()->with('success', 'Tracking Status Successfully Created!');

    }

    public function edit($id)
    {
        $data = lTrackingStatus::where('id', $id)->first();
        return view('backend.tracking.tracking_status', compact('data'));


    }

    public function update(Request $request, $id)
    {
        $input = lTrackingStatus::find($id);
        $input->tracking_status = $request->input('tr_status');
        $input->update();
        return redirect()->route('tracking-status.index')->with('success', 'Tracking Status Successfully Updated!');


    }


    public function datatable()
    {

        $data = lTrackingStatus::all();
        return datatables()->of($data)
            ->addColumn('active_yn', function ($query) {
                if ($query->active_yn == 'Y') {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('tracking-status.edit', $query->id) . '" class=""><button class="btn btn-primary">Edit</button></a> <a href="' . route('tracking-status.destroy', $query->id) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Tracking Type?\')"><button class="btn btn-danger">Delete</button></a>';
            })
            ->addIndexColumn()
            ->make();

    }

    public function destroy($id)
    {

        DB::delete('delete from tracking_status where id = ?', [$id]);
        return redirect()->route('tracking-status.index')->with('success', 'Tracking Status Successfully Deleted!');

    }

}
