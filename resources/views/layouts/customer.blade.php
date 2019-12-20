<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Materials Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <title>EasyBiz | User</title>

    <style type="text/css">


    .nav-link{
      font-size: 90%;
    }

    .nav-link:hover{
      opacity: 1;
    }

    .main{
      max-width: 990px;
      margin: 0 auto 0 auto;
      position: relative;
      background-color: #fbfdff;
      padding-top: 7rem;
      min-height: 100vh;

    }

    </style>
  </head>
  <body >

    <!--=============== Nav Start =============== -->
    <nav class="container navbar fixed-top navbar-expand-lg navbar-dark bg-primary" style="max-width: 990px;">
        <a class="navbar-brand" href="#">EasyBiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTrigger" aria-controls="navTrigger" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>

        <div class="collapse navbar-collapse" id="navTrigger">

          @guest

          <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">search</i>
                  Find Business
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">event_seat</i>
                  Check reservation
                </a>
              </li>
              

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">business</i>
                  Business account
                </a>
              </li>

              
            </ul>

            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}"> 
                  <i class="material-icons float-left">input</i>
                  Login
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}"> 
                  <i class="material-icons float-left">create</i>
                  Sign Up
                </a>
              </li>
            </ul>

          @else

            <ul class="navbar-nav mr-auto">

              <li class="nav-item active">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">search</i>
                  Find Biz
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">bookmark_border</i>
                  Bookmarked Biz
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">event_seat</i>
                  Check reservation
                </a>
              </li>

              <li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="material-icons float-left">assignment</i>
                    Reservations
                </a>
              </li>

            </ul>
          
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="material-icons float-left">account_circle</i>
                  Account
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="material-icons float-left">exit_to_app</i>
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul> 
            @endguest

        </div>
    </nav>
    <!--=============== Nav End =============== -->


    <main class="main">
        @yield('content')
    </main>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 

  </body>
</html>