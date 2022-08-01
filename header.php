<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo "$title"; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="icon" type="image/png" href="img/study.png">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
    <link rel="shortcut icon" href="img/car.jpg" type="image/x-icon" />
</head>

<body>

    <?php 
    error_reporting(0);
    session_start(); 

    if (!isset($_SESSION['username'])) {
      $_SESSION['msg'] = "You must log in first";
      //header('location: login.php');
    }
    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header("location: index.php");
    }


    if (isset($_POST['search'])) {
      $keywords = $_POST["keywords"];
    }
  ?>
    <nav class="navbar navbar-inverse navbar-fixed-top "
        style="background-color: black; text-transform: uppercase; border-bottom: 1px solid white;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/car.jpg" alt=""
                        style="width: 50px;height: 50px;"></a>
            </div>

            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="booking.php">Book Your Favourite Mechanic</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <!-- logged in user information -->
                    <?php  if (isset($_SESSION['username'])) { 

    echo '<li><a onclick="" href="registered.php"><i class="bi bi-save"></i> Previous Booking</a></li>

            <script>
              function clicked() {
                alert("This service is not available. Please Login");
              }
            </script>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-user-circle"></i> ' . $_SESSION['username'] . '
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
              </ul>
          </li>';

         
    }


    else {
      echo '<li><a onclick="clicked()" href="#"><i class="bi bi-save"></i> Previous Booking</a></li>
            <script>
              function clicked() {
                alert("You neeed to login first. Please click on Profile");
              }
            </script>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="far fa-user-circle"></i> Profile
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-plus-sign"></span> Sign Up</a></li>
              </ul>
            </li>';
    }
  ?>


                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 50px;display: block;" class="container after-nav"></div>


    <div>