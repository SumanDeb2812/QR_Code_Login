<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = explode(", ", $request->get('data'));
        $emp_id = $data[0];
        $password = $data[1];
        $result = DB::table('qr_code')
                    ->select('emp_id')
                    ->where('emp_id', $emp_id)
                    ->where('password', $password)
                    ->get();
        if($result->has([0])){
            session()->put(['emp_name' => $emp_id]);
            return 1;
        }else{
            return 0;
        }
    }
}
