<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function dd;
use function redirect;
use function response;

class UserProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $loggedUser = User::join('country','country.id','=','users.country_id')
            ->join('lmission','lmission.id','=','users.mission_id')
            ->join('role','role.id','=','users.role')
            ->where('users.id','=',$user->id)
            ->select('users.*', 'lmission.mission', 'country.country','role.role')->first();

        return view('backend.user.user_profile', compact('user','loggedUser'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {

        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Password changed successfully!!');
//        return response()->json(['message'=>'Password changed successfully!!'], 200);
//        dd('Password change successfully.');
    }
}
