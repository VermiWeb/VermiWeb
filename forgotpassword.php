<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Forgot Password</title>
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
  <link rel="stylesheet" href="forgotpassword.css">
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
              <a class="dropdown-item" href="index.html">Home<i class="fa-solid fa-house home-icon"></i></a>
              <a class="dropdown-item" href="index.html#about">About Us<i class="fa-solid fa-user-group about-icon"></i></a>
              <a class="dropdown-item" href="index.html#footer">Contact Us<i class="fa-solid fa-address-book contact-icon"></i></a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-lg-6 col-m-12 col-sm-12 left-side">
        <h1 class="welcome-text">Recover your Password</h1>
        <p class="description-text">No worries. We'll send you the recovery instructions.</p>

        <form class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <label for="email" class="email-label">Email:</label><br>
    <input type="text" id="email" name="email" placeholder="Enter your Email"><br>

    <label for="password" class="password-label">New Password:</label><br>
    <input type="password" id="password" name="password" placeholder="Enter your New Password"><br>

    <label for="password2" class="password2-label">Re-type Password:</label><br>
    <input type="password" id="password2" name="password2" placeholder="Re-type your Password"><br>

    <button type="submit" name="signin-button" class="signin-button">Submit</button></a>
    <p>Do you have an account? <a href="signup.html" class="signup-text">Sign Up</a></p>
</form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $email = isset($_POST['email']) ? $_POST['email'] : "";
          $password = isset($_POST['password']) ? $_POST['password'] : "";
          $password2 = isset($_POST['password2']) ? $_POST['password2'] : "";

          if ($password == $password2) {
              $serverName = "TEPANYANG\\SQLEXPRESS";
              $connectionOptions = [
                  "Database" => "DLSUD",
                  "Uid" => "",
                  "PWD" => ""
              ];
              $conn = sqlsrv_connect($serverName, $connectionOptions);

              if (!$conn) {
                  die("Connection failed: " . print_r(sqlsrv_errors(), true));
              }

              $useridstr = $email;
              $passwordhash = $password;

              // Check if the email exists in the database
              $sqlCheckEmail = "SELECT * FROM VERMI_WEB WHERE USER_EMAIL='$useridstr'";
              $emailResult = sqlsrv_query($conn, $sqlCheckEmail);

              if ($emailResult === false) {
                  die("Email query failed: " . print_r(sqlsrv_errors(), true));
              }

              if (sqlsrv_has_rows($emailResult)) {
                  // Update the password if the email exists
                  $sqlUpdatePassword = "UPDATE VERMI_WEB SET USER_PASS='$passwordhash' WHERE USER_EMAIL='$useridstr'";
                  $updateResult = sqlsrv_query($conn, $sqlUpdatePassword);

                  if ($updateResult === false) {
                      die("Update query failed: " . print_r(sqlsrv_errors(), true));
                  }

                  if (sqlsrv_rows_affected($updateResult) > 0) {
                      echo '<script>alert("Reset Successful!")</script>';
                      echo "<script>window.location.href='loginpage.php'</script>";
                  } else {
                      echo "Error updating password.";
                  }
              } else {
                  echo "Email does not exist.";
              }
          } else {
              echo 'Password did not match.';
          }
      }
      ?>


      </div>
      <div class="col-lg-6 col-m-12 col-sm-12">
        <div>
          <img class="vermi-img" src="images/reset-password.png" alt="reset-password.png">
        </div>
      </div>
    </div>
  </section>
  <br><br><br>
  <p class="footer-style">©️VermiWeb by VermiTeam 2023</p>
</body>

</html>
