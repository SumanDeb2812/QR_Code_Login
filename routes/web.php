<?php
require public_path().'/phpqrcode/qrlib.php';

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function (Request $request) {
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
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function (Request $request) {
    $emp_id = $request->get('emp_id');
    $password = md5($request->get('password'));
    $content = [$emp_id, $password];
    $text = implode(", ", $content);
    $file = $emp_id.".png";
    QRcode::png($text, $file, 'L', 20, 1);
    Storage::path($file);
    $result = DB::table('qr_code')
        ->insert([
            'emp_id' => $emp_id,
            'password' => $password,
            'qr_file' => $file
        ]);
    if($result == true){
        return redirect()->back()->with(['success' => 'Employee registered successfully']);
    }else{
        return redirect()->back()->withErrors(['error' => 'registration failed']);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
