<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use function dd;
use function env;
use function redirect;

class MailController extends Controller {


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send_email($id) {
        $details = User::find($id)->first();
        $user = Auth::user();

        Mail::to($details->email)->send(new SendMail($details));

//        dd("Email is Sent.");
        return redirect()->back()->with('success', 'Mail Send Successfully!!');
    }

//    public function send_email($id) {
//        $data = User::find($id)->first();
//        $user = Auth::user();
//
//        Mail::send(['text'=>'backend.mail'], $data, function($message) use ($data, $user) {
//            $message->to($data->email, $data->name)->subject
//            ('User Credentials');
//            $message->from($user->email, $user->name);
//        });
//        return redirect()->back()->with('success', 'Mail Send Successfully!!');
//    }
//    public function html_email() {
//        $data = array('name'=>"Virat Gandhi");
//        Mail::send('mail', $data, function($message) {
//            $message->to('abc@gmail.com', 'Tutorials Point')->subject
//            ('Laravel HTML Testing Mail');
//            $message->from('xyz@gmail.com','Virat Gandhi');
//        });
//        echo "HTML Email Sent. Check your inbox.";
//    }
//    public function attachment_email() {
//        $data = array('name'=>"Virat Gandhi");
//        Mail::send('mail', $data, function($message) {
//            $message->to('abc@gmail.com', 'Tutorials Point')->subject
//            ('Laravel Testing Mail with Attachment');
//            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
//            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
//            $message->from('xyz@gmail.com','Virat Gandhi');
//        });
//        echo "Email Sent with attachment. Check your inbox.";
//    }
}
