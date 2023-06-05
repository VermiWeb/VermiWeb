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

$signUpErr = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Variable to hold the values
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $username = isset($_POST['username']) ? $_POST['username'] : "";
  $userpassword = isset($_POST['userpassword']) ? $_POST['userpassword'] : "";
  $name = isset($_POST['name']) ? $_POST['name'] : "";
  $phone = isset($_POST['phone']) ? $_POST['phone'] : "";

  // Check if the email already exists in the database
  $checkQuery = "SELECT * FROM VERMI_WEB WHERE USER_EMAIL = '$email'";
  $checkStmt = sqlsrv_query($conn, $checkQuery);
  $existingUser = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);

  if ($existingUser) {
    $signUpErr = "<span style='color:red;'>Email already registered!</span>";
  } else {
    // Check if the username already exists in the database
    $checkQuery = "SELECT * FROM VERMI_WEB WHERE USER_NAME = '$username'";
    $checkStmt = sqlsrv_query($conn, $checkQuery);
    $existingUsername = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);

    if ($existingUsername) {
      $signUpErr = "<span style='color:red;'>Username already taken!</span>";
    } else {
      // Check if the phone number already exists in the database
      $checkQuery = "SELECT * FROM VERMI_WEB WHERE USER_PHONE = '$phone'";
      $checkStmt = sqlsrv_query($conn, $checkQuery);
      $existingPhone = sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC);

      if ($existingPhone) {
        $signUpErr = "<span style='color:red;'>Phone number already registered!</span>";
      } else {
        // Validate phone number
        if (!preg_match("/^\d{11}$/", $phone)) {
          $signUpErr = "<span style='color:red;'>Invalid phone number! Phone number should be an 11-digit number.</span>";
        } else {
          // Insert data into the database
          $sql = "INSERT INTO VERMI_WEB(USER_EMAIL, USER_NAME, USER_PASS, NAME, USER_PHONE) VALUES ('$email', '$username', '$userpassword', '$name', '$phone')";
          $stmt = sqlsrv_query($conn, $sql);
          if ($stmt) {
            echo '<script>alert("Sign-up Successful!")</script>';
            echo "<script>window.location.href='success.php'</script>";
          } else {
            echo "Error";
          }
        }
      }
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Sign Up</title>
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
        <h1 class="welcome-text">Sign Up</h1>

        <form id="registration"  class= "" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <label for="" class="name-label">Name:</label><br>
          <input type="text" id="name" name="name" placeholder="Enter your Name" required><br>

          <label for="" class="phone-label">Phone:</label><br>
          <input type="text" id="phone" name="phone" placeholder="Enter your Phone Number" required><br>

          <label for="" class="email-label" >Email:</label><br>
          <input type="text" id= "email" name="email" placeholder="Enter your Email" required><br>

          <label for="" class="username-label">Username:</label><br>
          <input type="text" id= "username" name="username" placeholder="Enter your Username" required><br>

          <label for="" class="password-label">Password:</label><br>
          <input type="password" id= "userpassword" name="userpassword" placeholder="Enter your Password" required class="password-box"><br>

          <button type="submit" id="regsub" name="regsub" class="signin-button">Sign Up</button><br>
          <?php echo $signUpErr?>
        
          <p>Go back to <a href="loginpage.php" class="signup-text">Login</a></p>

        </form>
        <p class="footer-style">©️VermiWeb by VermiTeam 2023</p>
      </div>
      
      <div class="col-lg-6 col-m-12 col-sm-12">
        <div>
          <img class="vermi-img" src="images/mainpageimage.png" alt="vermicomposting.png">
        </div>
      </div>
    </div>
  </section>
</body>

</html>