
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <title>@yield('title')</title>
   
</head>
<body>
    <x-navbar></x-navbar>
    <div class="container">
        @yield('contant')
    </div>
    <script src="{{asset('js/jquery-3.6.3.min.js')}}" ></script>
    <script src="{{asset('js/bootstrap.js')}}" ></script>

</body>
</html>