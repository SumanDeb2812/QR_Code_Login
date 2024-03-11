@php
    // sleep(2);
@endphp
@extends('layout')

@section('main-content')
<div class="flex w-(600px) py-10 rounded-md justify-between shadow-[0_0px_10px_rgba(0,0,0)] bg-blue-400 text-white">
    <div class="p-10">
        <div class="flex flex-col items-center justify-center w-80 h-full" id="reader"></div>
    </div>
    <div class="p-10 w-96">
        <h5 class="text-xl font-mono font-bold mb-10">Login With Credentials</h5>
        <div class="w-full">
            <div class="w-full flex items-center justify-between mb-5">
                <label for="" class="font-semibold">Employee ID</label>
                <input type="emp_id" class="p-1 rounded-md outline-none font-semibold">
            </div>
            <div class="w-full flex items-center justify-between mb-10">
                <label for="" class="font-semibold">Password</label>
                <input type="password" class="p-1 rounded-md outline-none font-semibold">
            </div>
            <input type="submit" value="Login" class="font-mono w-full font-semibold bg-blue-700 py-1 rounded-md hover:shadow-[0_2px_5px_rgba(0,0,0,0.8)] ease duration-100 cursor-pointer">
        </div>
    </div>
</div>
@endsection