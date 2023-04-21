<?php
session_start(); // Call session_start() before any output is sent

// Connect to the database
$serverName = "LAPTOP-GBO9I3B3\SQL";
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

$loginerr = ''; // Initialize login error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id_log = isset($_POST["username"]) ? $_POST["username"] : '';
    $user_pass_log = isset($_POST["password"]) ? $_POST["password"] : '';
    // Select the FORM_ID and USER_PASSWORD from the users table
    $sql = "SELECT USER_NAME, USER_PASSWORD FROM VERMI_USER WHERE USER_NAME=? AND USER_PASSWORD=?";
    $params = array($form_id_log, $user_pass_log);
    $result = sqlsrv_query($conn, $sql, $params);
    // Fetch the data from the database
 
    if (sqlsrv_has_rows($result) ) {
        header("Location: dashboard.php");
        exit();
    } else {
        $loginerr ="Invalid Username/Password.";
    }
}
?>


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
  <link rel="stylesheet" href="loginpage.css">
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
        <h1 class="welcome-text">Login</h1> 
        <p class="description-text">Please enter your details.</p>


        <form id ='login' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <label for="" class="name-label">Username:</label><br>

          <input type="text" id="username" name="username" placeholder="Enter your Username"><br>

          <label for="" class="password-label">Password:</label><br>

          <input type="password"  id="password" name="password" placeholder="Enter your Password" class="password-box"><br>
          
          <a  class="forgot-text">Forgot Password</a><br>   <!--DAT DITO YUNG FORGOT PASSWORD NA PHP FILE-->


          
          <input type="submit" value="Sign in" class="signin-button">
          <br>
          <?php echo $loginerr; ?>

          <br><br>
          
         <p>Do you have an account? <a href = "signup.php" class="signup-text">Sign Up</a></p> <!--DAT DITO YUNG FORGOT SIGNUP NA PHP FILE-->
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