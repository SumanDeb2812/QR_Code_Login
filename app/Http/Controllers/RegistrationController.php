<?php

namespace App\Http\Controllers;

require public_path().'/phpqrcode/qrlib.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use QRcode;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function registration(Request $request)
    {
        $fname = $request->get('f_name');
        $lname = $request->get('l_name');
        $email = $request->get('email');
        $password = md5($request->get('password'));
        $reg_id = $fname.rand(1000, 9999);        
        $content = [$reg_id, $password];
        $text = implode(" ", $content);
        $file = $reg_id . ".png";
        QRcode::png($text, $file, 'L', 20, 1);
        Storage::putFileAs($file, $file);
        unlink(public_path($file));
        $result = DB::table('qr_code')
            ->insert([
                'f_name' => $fname,
                'l_name' => $lname,
                'email' => $email,
                'password' => $password,
                'reg_id' => $reg_id,
                'qr_file' => $file
            ]);
        if($result == true){
            return redirect('/sendqrmail')->with(['name' => $fname, 'email' => $email, 'file' => $file]);
        }else{
            return redirect()->back()->withErrors(['error' => 'registration failed']);
        }
    }

    public function sendMail()
    {
        Mail::to(session()->pull('email'))->send(new MyTestEmail());
        return redirect('/')->with(['success', 'You are successfully registered']);
    }
}
