<?php

namespace App\Http\Controllers;

// require public_path().'/phpqrcode/qrlib.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $password = md5($request->get('password'));
        $content = [$emp_id, $password];
        $text = implode(", ", $content);
        // $file = $emp_id.".png";
        // QRcode::png($text, $file, 'L', 20, 1);
        // Storage::path($file);
        // $result = DB::table('qr_code')
        //     ->insert([
        //         'emp_id' => $emp_id,
        //         'password' => $password,
        //         'qr_file' => $file
        //     ]);
        // if($result == true){
        //     return redirect()->back()->with(['success' => 'Employee registered successfully']);
        // }else{
        //     return redirect()->back()->withErrors(['error' => 'registration failed']);
        // }
    }
}
