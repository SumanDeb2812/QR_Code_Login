@extends('layout')

@section('main-content')
    <button class="absolute top-5 left-5">Back</button>
    <div class="shadow-[0_5px_10px_rgb(0,0,0)] w-1/3 p-10 rounded-md bg-blue-400 text-white">
        <h2 class="font-bold text-2xl mb-5 font-mono">Register Yourself...</h2>
        <form action="{{ route('registration') }}" method="post" class="">
            @csrf
            <div class="mb-5 flex items-start justify-between flex-col w-full">
                <label for="" class="mb-1 font-semibold">First Name</label>
                <input type="text" name="f_name" id="" class="w-full p-1 rounded-md outline-none font-semibold">
            </div>
            <div class="mb-5 flex items-start justify-between flex-col w-full">
                <label for="" class="mb-1 font-semibold">Last Name</label>
                <input type="text" name="l_name" id="" class="w-full p-1 rounded-md outline-none font-semibold">
            </div>
            <div class="mb-5 flex items-start justify-between flex-col w-full">
                <label for="" class="mb-1 font-semibold">Email</label>
                <input type="email" name="email" id="" class="w-full p-1 rounded-md outline-none font-semibold">
            </div>
            <div class="mb-5 flex items-start justify-between flex-col w-full">
                <label for="" class="mb-1 font-semibold">Password</label>
                <input type="password" name="password" class="w-full p-1 rounded-md outline-none font-semibold">
            </div>
            <div class="mb-10 flex items-start justify-between flex-col w-full">
                <label for="" class="mb-1 font-semibold">Confirm Password</label>
                <input type="text" name="password" class="w-full p-1 rounded-md outline-none font-semibold">
            </div>
            <input type="submit" value="Submit" class="w-full p-1 rounded-md outline-none bg-blue-700 hover:shadow-[0_2px_5px_rgba(0,0,0,0.8)] ease duration-100 cursor-pointer font-semibold font-mono">
        </form>
        @if (session()->has('success'))
            <p>{{ session()->get('success') }}</p>
        @endif
        @error('error')
            {{ $message }}
        @enderror
    </div>
@endsection