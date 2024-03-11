<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="">Employee ID</label>
        <input type="text" name="emp_id" id="">
        <label for="">Password</label>
        <input type="password" name="password">
        <input type="submit" value="Submit">
    </form>
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif
    @error('error')
        {{ $message }}
    @enderror
</body>
</html>