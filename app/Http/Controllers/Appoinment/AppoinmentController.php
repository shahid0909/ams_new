<?php


namespace App\Http\Controllers\Appoinment;

use App\Http\Controllers\Controller;
use App\Models\LAppoinmentType;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function compact;
use function dd;
use function time;

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

    public function appointment_report()
    {
        $appointment_types = LAppoinmentType::all();
        $pdf = PDF::loadView('backend.appoinment.appointment_pdf', compact('appointment_types'))->setPaper('a4', 'portrait');
        $fileName =  time().'.'. 'pdf' ;
        return $pdf->stream($fileName);
    }
}
