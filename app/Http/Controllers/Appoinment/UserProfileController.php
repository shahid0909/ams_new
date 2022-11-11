<?php

namespace App\Http\Controllers\Appoinment;

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
//        dd($user);
        return view('backend.user.user_profile', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
//        dd($request);
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect()->back()->with('message', 'Password changed successfully!!');
//        return response()->json(['message'=>'Password changed successfully!!'], 200);
//        dd('Password change successfully.');
    }
}
