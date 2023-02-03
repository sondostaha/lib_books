
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <title>@yield('title')</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Route book</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{route('books.index')}}">All Books</a>
            </li>
            <li class="nav-item">
             <a class="nav-link active" href="{{route('categories.index')}}">All Categories</a>
            </li>
          </ul>
          @guest
            <ul class="navbar-nav ml-auto">
              <li class="nav-item ">
               <a class="nav-link " href="{{route('auth.register')}}">Register</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{route('auth.login')}}">Login</a>
              </li>        
          @endguest

          @auth
              <li class="nav-item ">
                <a class="nav-link disabled" href="#">{{Auth::user()->name}}</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="{{route('auth.logout')}}">Logout</a>
              </li>
          @endauth
          </ul>
        </div>
    </nav> 
</head>
<body>
    <div class="container">
        @yield('contant')
    </div>
    <script src="{{asset('js/bootstrap.js')}}" ></script>
    <script src="{{asset('js/jquery-3.6.3.min.js')}}" ></script>
</body>
</html>