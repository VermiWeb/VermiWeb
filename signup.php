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
  <link rel="stylesheet" href="signup.css">
</head>

<body>
  <section id="title">
    <nav class="navbar fixed-top navbar-expand-lg navbar-style">
      <img src="images/vmwlogo.png" alt="logo.png" class="logo-style"><a href="index.html" class="navbar-brand">VermiWeb</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      </button>
      <div class="collapse navbar-collapse threebars-style" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-style" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-bars bars-style"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-right menu-style" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="index.php">Home<i class="fa-solid fa-house home-icon"></i></a>
              <a class="dropdown-item" href="index.php#about">About Us<i class="fa-solid fa-user-group about-icon"></i></a>
              <a class="dropdown-item" href="index.php#footer">Contact Us<i class="fa-solid fa-address-book contact-icon"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-6 col-m-12 col-sm-12 left-side">
        <h1 class="welcome-text">Sign Up</h1>

        <form id="registration"  class= "" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <label for="" class="email-label" >Email:</label><br>
          <input type="text" id= "email" name="email" placeholder="Enter your Email" required><br>

          <label for="" class="name-label">Username:</label><br>
          <input type="text" id= "username" name="username" placeholder="Enter your Username" required><br>

          <label for="" class="password-label">Password:</label><br>
          <input type="password" id= "userpassword" name="userpassword" placeholder="Enter your Password" required class="password-box"><br>

         

          <button type="submit" id="regsub" name="regsub" class="signin-button">Sign Up</button></a>
         
   


          <p>Go back to <a href="loginpage.php" class="signup-text">Login</a></p>

        </form>




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


//Variable to hold the values
$email = $_POST['email'];
$username = $_POST['username'];
$userpassword =  $_POST['userpassword'];



//Check if the time in button is pressed
if(isset($_POST['regsub'])){

  // Insert date and time values into database
  $sql ="INSERT INTO VERMI_USER(EMAIL, USER_NAME, USER_PASSWORD) VALUES ('$email', '$username' , '$userpassword')";
 
  $stmt = sqlsrv_query($conn, $sql);
  if ($stmt) {  
    echo '<script>alert("Sign-up Successful!")</script>';
    exit();
  }
  else {
    echo "Error ";
  }
}
?>