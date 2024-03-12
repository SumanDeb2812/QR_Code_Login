<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        $data = explode(" ", $request->get('data'));
        $reg_id = $data[0];
        $password = $data[1];
        $result = DB::table('qr_code')
                    ->select('f_name', 'l_name')
                    ->where('reg_id', $reg_id)
                    ->where('password', $password)
                    ->get();
        if($result->has([0])){
            foreach($result as $row)
            session()->put([
                        'f_name' => $row->f_name,
                        'l_name' => $row->l_name
                    ]);
            return 1;
        }else{
            return 0;
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
