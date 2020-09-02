<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome: @yield('title',$title)</title>
    <link rel="stylesheet" href="{{url('lib/bootstrap/css/bootstrap.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>College Management System</h1>
        <br>
        <div class="col-lg-9">
            <h4><a href="{{route('home')}}">Home</a></h4>
        </div>

        <div class="col-lg-3" >
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </div>
    @yield('content')
</div>


</body>
</html>
