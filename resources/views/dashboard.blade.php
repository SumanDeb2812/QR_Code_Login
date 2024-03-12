@extends('layout')

@section('main-content')
<div class="w-full h-full">
    <nav class="flex px-20 py-5 justify-between items-center bg-slate-400">
        <h2 class="text-xl font-bold font-mono">QR_LOGIN</h2>
        <div class="flex">
            <h2 class="font-semibold mr-10">Welcome, {{ session()->get('f_name') . " " . session()->get('l_name') }}</h2>
            <a href="{{ url('logout') }}" class="bg-red-500 px-4 rounded-md font-semibold font-mono text-white hover:shadow-[0_2px_3px_rgb(0,0,0)] ease-linear duration-100 cursor-pointer">Logout</a>
        </div>
    </nav>
</div>
@endsection