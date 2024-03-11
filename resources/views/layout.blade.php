<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite('resources/css/app.css')
  <title>Bootstrap Site</title>
</head>
<body class="flex w-screen h-screen items-center flex-col justify-center bg-blue-100">
    @yield('main-content')



    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>