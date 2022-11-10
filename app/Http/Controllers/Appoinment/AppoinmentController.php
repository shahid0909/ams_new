<?php


namespace App\Http\Controllers\Appoinment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoinmentController extends Controller
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
        return view('backend.appoinment.list');
    }

public function reports(){
    return view('backend.appoinment.reports');
}
}
