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
  <script src="https://kit.fontawesome.com/0dbdcb52b2.js" crossorigin="anonymous"></script>
  <!--GOOGLE FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet">
  <!--CSS FILE-->
  <link rel="stylesheet" href="history.css">
</head>

<body>

  <section id="title">
    <ul>
      <li>
        <img src="images/vmwlogo.png" alt="logo.png" class="logo-style">
        <h1 class="navbar-brand">VermiWeb</h1>
      </li>
      <li class="hello-text">Welcome Back!</li>
      <li class="tab-one"><a href="dashboard.php">Dashboard</a></li>
      <li><a class="active" href="history.php">History</a></li>
      <li><a href="profile.php">My Profile</a></li>
      <li><a href="loginpage.php">Logout</a></li>
    </ul>
  </section>

  <section id="content">
    <div id="History" class="tabcontent">
      <h3 class="dashboard-text">HISTORY</h3>
      <a class="nav-link dropdown-style" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-solid fa-bell"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right text-right menu-style" aria-labelledby="navbarDropdownMenuLink">
        <table>
          <h4 class="date-notif">Today</h4>
          <th class="notif-message">Your Compost is ready for harvest!</th>
        </table>
      </div>
      <table>
        <h4>Today</h4>
        <tr>
          <th>TIME</th>
          <th>WEIGHT</th>
          <th>SOIL MOISTURE</th>
          <th>TEMPERATURE</th>
        </tr>
        <tr>
          <td>1:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>2:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>3:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>4:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>5:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>6:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>7:00am</td>
          <td>100kg</td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>8:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>9:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>10:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
      </table>
      <br>
      <table>
        <h4>Yesterday</h4>
        <tr>
          <th>TIME</th>
          <th>WEIGHT</th>
          <th>SOIL MOISTURE</th>
          <th>TEMPERATURE</th>
        </tr>
        <tr>
          <td>1:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>2:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>3:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>4:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>5:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>6:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>7:00am</td>
          <td>100kg</td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>8:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>9:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
        <tr>
          <td>10:00am</td>
          <td></td>
          <td>20%</td>
          <td>21°C</td>
        </tr>
      </table>
    </div>
  </section>

</body>

</html>