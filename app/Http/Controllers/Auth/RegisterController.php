<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\country;
use App\Models\lmission;
use App\Models\role;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $user = Auth::user();

        $country = country::orderby('country','asc')->get();
        $missionlogged = User::join('country','country.id','=','users.country_id')
            ->join('lmission','lmission.id','=','users.mission_id')
            ->select('users.*', 'lmission.mission', 'country.country')->first();


        if ($user->role == 1) {
            $role = role::all();
        } else {
            $role = role::whereNotIn('id', [1, 2])->get();;

        }

        return view('backend.user', compact('user', 'role', 'country','missionlogged'));
    }

    public function getMissionAjax(Request $request)
    {
        $data = lmission::where('country_id', $request->country_id)->get();

        return response()->json($data);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
    {
//        dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

        ]);

        $input = new User();
        $input->name = $request->name;
        $input->email = $request->email;
        $input->contact_no = $request->contactNo;
        $input->mission_id = $request->mission_id;
        $input->country_id = $request->country_id;
        $input->role = $request->role;
        $input->active_yn = 'Y';
        $input->password = Hash::make($request['password']);
        $input->save();

        return back()->with('success', 'User Successfully Created!');
    }

    public function datatable()
    {
        $user = Auth::user();
        if ($user->role == 1) {
            $data = DB::table('users')
                ->join('lmission', 'lmission.id', '=', 'users.mission_id')
                ->join('country', 'country.id', '=', 'users.country_id')
                ->join('role', 'role.id', '=', 'users.role')
//                ->where('users.active_yn', '=', 'Y')
                ->orderBy('users.id', 'desc')
                ->select('users.*', 'lmission.mission', 'country.country', 'role.role')->get();

        }else{
            $data = DB::table('users')
                ->join('lmission', 'lmission.id', '=', 'users.mission_id')
                ->join('country', 'country.id', '=', 'users.country_id')
                ->join('role', 'role.id', '=', 'users.role')
                ->where('users.mission_id', '=', $user->mission_id)
                ->orderBy('users.id', 'desc')
                ->select('users.*', 'lmission.mission', 'country.country', 'role.role')->get();
        }

        return datatables()->of($data)
            ->editColumn('active_yn', function ($query) {
                if ($query->active_yn == 'Y') {
                    return '<a href="' . route('user.inactive', $query->id) . '" class=""><button class="btn btn-success">Active</button></i></a>';
                } else {
                    return '<button class="btn btn-inverse-danger" >Inactive</button>';
                }
            })
//            ->editColumn('action', function ($query) {
////                return 'Work in Progerss';
//                return ' || <a href="' . route('mission.destroy', $query->id) . '" class="" onclick="return confirm(\'Are You Sure You Want To Delete This Mission?\')"><button class="btn btn-danger">Delete</button></i></a>';
//            })
                ->escapeColumns([])
            ->addIndexColumn()
            ->make();
    }

}
