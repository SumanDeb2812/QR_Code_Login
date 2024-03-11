@if (session()->has('emp_name'))
    Welcome, {{ session()->get('emp_name') }}
@endif