<?php

// Connect to database
$serverName = "TEPANYANG\SQLEXPRESS"; //TEPANYANG\SQLEXPRESS or LAPTOP-GBO9I3B3\SQL
$connectionOptions = [
  "Database" => "DLSUD",
  "Uid" => "",
  "PWD" => ""
];
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if (!$conn) {
  die("Connection failed: " . sqlsrv_errors());
}

$sql = "SELECT USER_ID FROM VERMI_WEB WHERE USER_ID=(SELECT IDENT_CURRENT('VERMI_WEB'))";
$results = sqlsrv_query($conn,$sql);
$userid = sqlsrv_fetch_array($results);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registration Successful</title>
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
  <link rel="stylesheet" href="success.css">
</head>

<body>
  <section id="title">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark navbar-style">
      <img src="images/vmwlogo.png" alt="logo.png" class="logo-style"><a href="index.php" class="navbar-brand">VermiWeb</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav ml-auto">
          <li class="nav-list active">
            <a class="nav-link links" href="index.php">Home</a>
          </li>
          <li class="nav-list active">
            <a class="nav-link links" href="index.php#testimonials">Vermicomposting</a>
          </li>
          <li class="nav-list active">
            <a class="nav-link links" href="index.php#about">About Us</a>
          </li>
          <li class="nav-list active">
            <a class="nav-link links" href="index.php#footer">Contact Us</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-6 col-m-12 col-sm-12 left-side">
        <h1 class="welcome-text">Registration Successful</h1>
        <h1>USERID: <?php echo $userid['USER_ID']?></h1>
        <button id="login-btn" type="button" class="btn btn-success edit-button">Go to Login</button>
        <script type="text/javascript">
            document.getElementById("login-btn").onclick = function(){
            location.href = "loginpage.php";
        };
      </script>
      </div>
      
      <div class="col-lg-6 col-m-12 col-sm-12">
        <div>
          <img class="vermi-img" src="images/mainpageimage.png" alt="vermicomposting.png">
        </div>
      </div>
    </div>
  </section>
  <br><br><br>
  <p class="footer-style">©️VermiWeb by VermiTeam 2023</p>
</body>

</html>