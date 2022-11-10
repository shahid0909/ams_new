<?php


namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\employee;
use App\Models\LCountry;
use App\Models\lDesignation;
use App\Models\lmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CountryController extends Controller
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
        return view('backend.setup.country', compact('data'));
    }

    public function store(Request $request)
    {

        $input = new country();
        $input->country = $request->input('country');
        $input->active_yn = $request->input('active_yn');
        $input->save();
        return back()->with('success', 'Country Successfully Created!');

    }

    public function edit($id)
    {
        $data = country::where('id', $id)->first();
        return view('backend.setup.country', compact('data'));


    }

    public function update(Request $request, $id)
    {
        $input = country::find($id);
        $input->country = $request->input('country');
        $input->active_yn = $request->input('active_yn');
        $input->update();
        return redirect()->route('country.index')->with('success', 'Country Successfully Updated!');


    }


    public function datatable()
    {

        $data = country::all();
        return datatables()->of($data)
            ->addColumn('active_yn', function ($query) {
                if ($query->active_yn == 'Y') {
                    return 'Active';
                } else {
                    return 'Inactive';
                }
            })
            ->editColumn('action', function ($query) {
                return '<a href="' . route('country.edit', $query->id) . '" class=""><button class="btn btn-primary">Edit</button></a> <a href="' . route('country.destroy', $query->id) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This country?\')"><button class="btn btn-danger">Delete</button></a>';
            })
            ->addIndexColumn()
            ->make();

    }

    public function destroy($id)
    {

        DB::delete('delete from country where id = ?', [$id]);
        return redirect()->route('country.index')->with('success', 'Country Successfully Deleted!');

    }

}
