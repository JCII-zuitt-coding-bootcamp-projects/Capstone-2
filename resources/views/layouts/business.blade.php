<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Business Template</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Materials Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Custom styles for this template -->
  <style type="text/css">
    
    /*!
 * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
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
        
      
        <div class="sidebar-heading bg-dark text-white ">EasyBiz</div>
        <div class="list-group list-group-flush pt-3">

          <ul class="list-group list-group">
            <li class="list-group-item font-weight-light">
                <i class="material-icons float-left text-secondary">account_box</i>
                Login as: John Doe
            </li>
          </ul>

              <a href="#" class="list-group-item list-group-item-action bg-secondary text-white">Overview</a>

              <!-- Reservations START -->
              <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleReservations" role="button" aria-expanded="false" aria-controls="collapseExampleReservations">
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
                </div>
              <!-- Reservations End -->


              <!-- Tools START -->
                <a class="list-group-item list-group-item-action bg-secondary text-white"  data-toggle="collapse" href="#collapseExampleTools" role="button" aria-expanded="false" aria-controls="collapseExampleTools">
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
                </div>
              <!-- Tools End -->


              <!-- Bookable START -->
                <a class="list-group-item list-group-item-action bg-secondary text-white mt-2"  data-toggle="collapse" href="#collapseExampleBookable" role="button" aria-expanded="false" aria-controls="collapseExampleBookable">
                Bookables
                <i class="material-icons float-right">keyboard_arrow_down</i>
              </a>
                <div class="collapse" id="collapseExampleBookable">
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">visibility</i>
                      View all
                  </a>
                  <a href="#" class="list-group-item list-group-item-action ">
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
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">visibility</i>
                      View all
                  </a>
                  <a href="#" class="list-group-item list-group-item-action ">
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
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">supervised_user_circle</i>
                      View all
                  </a> <!-- /Reserve -->
                  <a href="#" class="list-group-item list-group-item-action ">
                      <i class="material-icons float-right">group_add</i>
                      Add new staff
                  </a> 
                </div>
              <!-- Staff End -->


              <ul class="list-group list-group mt-4">
                <li class="list-group-item">
                    <i class="material-icons float-left text-secondary">calendar_today</i>
                    Date: December 2, 2019
                </li>
                <li class="list-group-item">
                    <i class="material-icons float-left text-secondary">access_time</i>
                    Time: 12:22 pm
                </li>
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
          Market Cinemas
        </span>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons">menu</i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Business profile</a>
                <a class="dropdown-item" href="#">Edit profile</a>
                <a class="dropdown-item" href="#">My privilages</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav >

      <div class="container-fluid">
        <h1 class="mt-4">Simple Sidebar</h1>
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>


        <h1>Hello, world33!</h1>
      <h1 >Hello, worlsd!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>
      <h1>Hello, world!</h1>

      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->



</main> <!-- most outer container -->


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Menu Toggle Script -->
  <script>

    $( document ).ready(function() {
        console.log( "ready!" );

        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
          $("#menu-toggle").text( $(this).text() == 'keyboard_arrow_left' ? 'keyboard_arrow_right' : 'keyboard_arrow_left' );

        });

        // $('.collapse').collapse();
    });


    

  </script>

</body>

</html>