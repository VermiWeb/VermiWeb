<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>VermiWeb</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--BOOTSTRAP-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
  <!--ICONS-->
  <script src="https://kit.fontawesome.com/6ad1a3c168.js" crossorigin="anonymous"></script>
  <!--GOOGLE FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!--CSS FILE-->
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>
  <section id="title">
    <ul>
      <li class="brand-li">
        <img src="images/vmwlogo.png" alt="logo.png" class="logo-style">
        <h1 class="navbar-brand">VermiWeb</h1>
      </li>
      <li class="hello-text">Welcome Back!</li>
      <li class="tab-one"><a class="active" href="dashboard.php">Dashboard</a></li>
      <li><a href="history.php">History</a></li>
      <li><a href="profile.php">My Profile</a></li>
      <li><a href="javascript:reportpageFunction()">Logout</a></li>
      <script>
        function reportpageFunction(){
          window.location.href="logout.php";
        }
      </script>
    </ul>

    <div id="Dashboard" class="tabcontent">
      <div class="row">
        <div class="col-md-6 div-dashboard">
          <h3 class="dashboard-text">DASHBOARD</h3>
        </div>
        <div class="col-md-6 div-dropdown">
          <a class="nav-link dropdown-style" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa-solid fa-solid fa-bell bars-style"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right text-right menu-style" aria-labelledby="navbarDropdownMenuLink">
          <table>
            <h4 class="date-notif">Today</h4>
            <th class="notif-message">Your Compost is ready for harvest!</th>
          </table>
        </div>
        </div>
      </div>

      <div class="card-deck">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card shadow p-3 mb-5 bg-white rounded">
              <img class="card-img-top weight-img" src="images/weight.png" alt="weight.png">
              <div class="card-body">
                <h5 class="card-title">WEIGHT</h5>
                <p class="card-text">100kg</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card shadow p-3 mb-5 bg-white rounded">
              <img class="card-img-top soil-img" src="images/soil.png" alt="soilmoisture.png">
              <div class="card-body">
                <h5 class="card-title">SOIL MOISTURE</h5>
                <p class="card-text">70%</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <div class="card shadow p-3 mb-5 bg-white rounded">
              <img class="card-img-top temp-img" src="images/temperature.png" alt="temperature.png">
              <div class="card-body">
                <h5 class="card-title">TEMPERATURE</h5>
                <p class="card-text">21°C</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>