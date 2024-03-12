@extends('layout')

@section('main-content')
    <div class="flex items-center flex-col justify-center">
        <h2 class="text-3xl font-bold mb-5">Login System With QR Code</h2>
        <div class="flex">
            <a href="{{ url('login') }}"><button class="bg-red-500 px-5 py-1 rounded-md text-white mr-5">Get Started</button></a>
            <a href="{{ url('registration') }}"><button class="bg-blue-500 px-5 py-1 rounded-md text-white">Register</button></a>
        </div> 

        @if (session()->has('success'))
            <h2 class="mt-20 bg-green-400 px-20 py-1 text-green-900 font-bold shadow-[0_0_10px_6px_#22c55e] rounded-md">{{ session()->get('success') }}</h2>
        @endif
    </div>
@endsection