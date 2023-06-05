<?php
session_start();

$serverName = "TEPANYANG\SQLEXPRESS";
$connectionOptions = array(
  "Database" => "DLSUD",
  "Uid" => "",
  "PWD" => ""
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check the connection
if ($conn === false) {
  die(print_r(sqlsrv_errors(), true));
}
            
$form_id_log = isset($_SESSION["form_id_log"]) ? $_SESSION["form_id_log"] : '';
$query = "SELECT * FROM VERMI_WEB WHERE USER_NAME='$form_id_log'";

$results = sqlsrv_query($conn, $query);
if ($results === false) {
  die(print_r(sqlsrv_errors(), true));
}

if ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
  $_SESSION["form_id_log"] = $form_id_log;
  $userid = $row['USER_ID'];
  $name = $row['NAME'];
  $username = $row['USER_NAME'];
  $email = $row['USER_EMAIL'];
  $phone = $row['USER_PHONE'];
  $initial = $row['INITIAL_WEIGHT'];
  $final = $row['FINAL_WEIGHT'];
} else {
  $userid = 'Unknown';
  $name = 'Unknown';
  $username = 'Unknown';
  $email = 'Unknown';
  $phone = 'Unknown';
  $initial = 'Unknown';
  $final = 'Unknown';
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>My Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
    <!--ICONS-->
    <script src="https://kit.fontawesome.com/6ad1a3c168.js" crossorigin="anonymous"></script>
    <!--GOOGLE FONTS-->
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Mulish:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!--CSS FILE-->
    <link rel="stylesheet" href="profile.css">
</head>

<body>

    <section id="title">
        <ul>
        <li class="brand-li">
            <img src="images/vmwlogo.png" alt="logo.png" class="logo-style">
            <h1 class="navbar-brand">VermiWeb</h1>
        </li>
        <li class="hello-text">Welcome Back!</li>
        <li class="tab-one"><a href="dashboard.php">Dashboard</a></li>
        <li><a href="history.php">History</a></li>
        <li><a class="active" href="profile.php">My Profile</a></li>
        <li><a href="javascript:reportpageFunction()">Logout</a></li>
        <script>
            function reportpageFunction(){
            window.location.href="logout.php";
            }
        </script>
        </ul>

        <div id="History" class="tabcontent">
            <div class="row">
            <div class="col-md-6 div-dashboard">
            <h3 class="dashboard-text">MY PROFILE</h3>
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
            <div class="profile-row">
                <div class="row info-row">
                    <table>
                        <tr>
                            <td>
                                <h3>
                                    <span class="profile-name"><?php echo $name; ?></span>
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span class="userid-style">User ID: </span><?php echo $userid ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span class="email-style">Email: </span><?php echo $email ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span class="username-style">Username: </span><?php echo $username ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><span class="phone-style">Phone Number: </span><?php echo $phone ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <h5 class="initial-weight">INITIAL WEIGHT: </h5>
                <p class="initialweight-values"><?php echo $initial?>kg</p>
            </div>
            <div class="row">
                <h5 class="final-weight">EXPECTED FINAL WEIGHT: </h5>
                <p class="finalweight-values"><?php echo $final?>kg</p>
            </div>
            <div class="row">
                <h5 class="optimal-soil">OPTIMAL SOIL MOISTURE CONTENT: </h5>
                <p class="optimalsoil-values">60% - 80%</p>
            </div>
            <div class="row">
                <h5 class="optimal-temp">OPTIMAL TEMPERATURE CONTENT: </h5>
                <p class="optimaltemp-values">15°C - 28°C</p>
            </div>

            <button id="edit-button" type="button" class="btn btn-success edit-button">Edit Profile</button>
            <script type="text/javascript">
                document.getElementById("edit-button").onclick = function () {
                    location.href = "editprofile.php";
                };
            </script>
        </div>
    </section>


</body>

</html>