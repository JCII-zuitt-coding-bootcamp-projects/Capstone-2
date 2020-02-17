<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EasyBiz | Business</title>
  

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Materials Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Custom styles for this template -->
  <style type="text/css">
    
    body {
      overflow-x: hidden;
      /*position: relative; */
    }

    main{
      max-width: 1110px;
      margin: 0 auto 0 auto;
      position: relative;
    }

    #sidebar-wrapper {
      min-height: 100vh;
      margin-left: -15rem;
      -webkit-transition: margin .25s ease-out;
      -moz-transition: margin .25s ease-out;
      -o-transition: margin .25s ease-out;
      transition: margin .25s ease-out;
      position: fixed;
      bottom: 0;
      /*float: left;*/
    }



    #sidebar-wrapper .sidebar-heading {
      padding: 0.875rem 1.25rem;
      font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
      width: 15rem;
    }

    #page-content-wrapper {
      min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
      margin-left: 0;
    }

    #menu-toggle{
      cursor: pointer;
    }

    @media (min-width: 768px) {
      #sidebar-wrapper {
        margin-left: 0;
        visibility: visible;
        border:0;

      }

      #page-content-wrapper {
        min-width: 0;
        width: 100%;
      }

      #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
        visibility: hidden;
        border:0;
      }
    }


    .d-flex{
      margin-left: -2px;
    }

  </style>

</head>

<body>
<main id="main">
  


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border border-top-0 position-static " id="sidebar-wrapper"><!--  style="height: 100%; position: relative;" -->
      <div class="sticky-top">
        
      
        <div class="sidebar-heading bg-dark  ">
            <a href="{{ route('admin.home') }}" class="text-white">
              EasyBiz
            </a>
        </div>
        <div class="list-group list-group-flush pt-3">

          @auth('admin')
            <ul class="list-group list-group">
              <li class="list-group-item font-weight-light">
                  <i class="material-icons float-left text-secondary">account_box</i>
                  Login as:
                  <br>
                  {{ auth('admin')->user()->email }}
              </li>
            </ul>
          @endauth

              {{-- <a href="#" class="list-group-item list-group-item-action bg-secondary text-white">Overview</a> --}}
              

              <!-- Reservations START -->
              {{-- <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleReservations" role="button" aria-expanded="false" aria-controls="collapseExampleReservations">
                Reservations
                <i class="material-icons float-right">keyboard_arrow_down</i>
              </a>
                <div class="collapse" id="collapseExampleReservations">
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">local_activity</i>
                      Sell Ticket
                  </a> <!-- /Reserve -->
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">cancel_presentation</i>
                      Cancel Reservation
                  </a> 
                </div> --}}
              <!-- Reservations End -->


              <!-- Tools START -->
                {{-- <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleTools" role="button" aria-expanded="false" aria-controls="collapseExampleTools">
                Tools
                <i class="material-icons float-right">keyboard_arrow_down</i>
              </a>
                <div class="collapse" id="collapseExampleTools">
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">security</i>
                      Verify ticket
                  </a> 
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">location_searching</i>
                      Find ticket location
                  </a> 
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">tv</i>
                      Monitor bookable
                  </a> 
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">print</i>
                      Print ticket
                  </a> 
                </div> --}}
              <!-- Tools End -->


              <!-- Bookable START -->
                <a class="list-group-item list-group-item-action bg-secondary text-white mt-2"  data-toggle="collapse" href="#collapseExampleBookable" role="button" aria-expanded="false" aria-controls="collapseExampleBookable">
                Bookable Schedules
                <i class="material-icons float-right">keyboard_arrow_down</i>
              </a>
                <div class="collapse" id="collapseExampleBookable">
                  <a href="{{ route('admin.bookable.index') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">visibility</i>
                      View all
                  </a>
                  <a href="{{ route('admin.bookable.create') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">add_to_photos</i>
                      Add new bookable
                  </a>
                </div>
              <!-- Bookable End -->


              <!-- Templates Templates START -->
                <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleBookableTemplates" role="button" aria-expanded="false" aria-controls="collapseExampleBookableTemplates">
                Bookable Templates
                <i class="material-icons float-right">keyboard_arrow_down</i>
                </a>
                <div class="collapse" id="collapseExampleBookableTemplates">
                  <a href="{{ route('admin.bookable.templates.index') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">visibility</i>
                      View all
                  </a>
                  <a href="{{ route('admin.bookable.templates.create') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">post_add</i>
                      Design new template
                  </a>
                </div>
              <!-- Templates Templates End -->

              <!-- Staff START -->
              <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleStaff" role="button" aria-expanded="false" aria-controls="collapseExampleStaff">
                Staff
                <i class="material-icons float-right">keyboard_arrow_down</i>
              </a>
                <div class="collapse" id="collapseExampleStaff">
                  <a href="{{ route('admin.staff.index') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">supervised_user_circle</i>
                      View all
                  </a> <!-- /Reserve -->
                  <a href="{{ route('admin.staff.create') }}" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">group_add</i>
                      Add new staff
                  </a> 
                </div>
              <!-- Staff End -->
              <a href=" {{ route('admin.verify.ticket')}} " class="list-group-item list-group-item-action bg-secondary text-white">
                  Verify ticket
                  <i class="material-icons float-right">security</i>
              </a>

              <ul class="list-group list-group mt-4">
                <li class="list-group-item">
                    <i class="material-icons float-left text-secondary">calendar_today</i>
                    Date: {{ Carbon\Carbon::now()->toFormattedDateString() }}
                </li>
                {{-- <li class="list-group-item">
                    <i class="material-icons float-left text-secondary">access_time</i>
                    Time: 12:22 pm
                </li> --}}
              </ul>

        </div>

      </div> <!-- sticky-top div end -->
    </div>
    <!-- /#sidebar-wrapper -->




    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom sticky-top">
        <!-- <button class="btn btn-primary">Toggle Menu</button> -->
        <i class="material-icons text-white"  id="menu-toggle">keyboard_arrow_left</i>

        <span class="text-white">
          @auth('admin')
            {{ auth('admin')->user()->business->name }}
          @endauth
        </span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

           @guest('admin')

              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.login') }}"> 
                  <i class="material-icons float-left">input</i>
                  Login
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.register') }}"> 
                  <i class="material-icons float-left">create</i>
                  Sign Up
                </a>
              </li>

            @else
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{-- <a class="dropdown-item" href="#">Business profile</a>
                    <a class="dropdown-item" href="#">Edit profile</a>
                    <a class="dropdown-item" href="#">My privilages</a> --}}

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>

              </li>
           @endguest



          </ul>
        </div>
      </nav >

      <div class="container-fluid pt-5">
        

        @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show mx-4" role="alert">
              <strong> {{ session('success')[0] }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif

        @yield('content')
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


<div class="modal fade" id="loading_data" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Loading data</h5>
      </div>
      <div class="modal-body">
        Please wait...
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="updating_data" tabindex="-1" role="dialog" aria-labelledby="loading_data" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Updating data</h5>
      </div>
      <div class="modal-body">
        Please wait...
      </div>
    </div>
  </div>
</div>


</main> <!-- most outer container -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- development version, includes helpful console warnings -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

  <!-- production version, optimized for size and speed -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}

  


  @yield('external-js')

  <script>

    $( document ).ready(function() {
        console.log( "ready!" );

        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
          $("#menu-toggle").text( $(this).text() == 'keyboard_arrow_left' ? 'keyboard_arrow_right' : 'keyboard_arrow_left' );

        });
    });


    

  </script>

</body>

</html>
