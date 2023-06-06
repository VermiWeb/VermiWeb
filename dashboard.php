<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <title>Dashboard</title>
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
    <!-------------------------------------------------- NAV BAR SECTION ------------------------------------------------------------------->
    <section id="title">
      <ul>
        <li class="brand-li">
          <img src="images/vmwlogo.png" alt="logo.png" class="logo-style">
          <h1 class="navbar-brand">VermiWeb</h1>
        </li>
        <li class="hello-text">
          Welcome Back!
        </li>
        <li class="tab-one">
          <a class="active" href="dashboard.php">Dashboard</a>
        </li>
        <li>
          <a href="history.php">History</a>
        </li>
        <li>
          <a href="profile.php">My Profile</a>
        </li>
        <li>
          <a href="javascript:reportpageFunction()">Logout</a>
        </li>
        <script>
          function reportpageFunction(){
            window.location.href="logout.php";
          }
        </script>
      </ul>

      <!------------------------------------------------------ DASHBOARD CONTENT ----------------------------------------------------------->
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
                <!-- PHP CODE FOR NOTIFICATION MESSAGE -->
                <?php
                session_start();
                // MSSQL database connection parameters
                $mssqlServer = 'TEPANYANG\SQLEXPRESS';
                $mssqlUsername = '';
                $mssqlPassword = '';
                $mssqlDatabase = 'DLSUD';

                // MySQL database connection parameters
                $mysqlServer = 'localhost';
                $mysqlUsername = 'root';
                $mysqlPassword = '';
                $mysqlDatabase = 'vermi';

                // Create MSSQL connection
                $mssqlConn = sqlsrv_connect($mssqlServer, array(
                  "Database" => $mssqlDatabase,
                  "Uid" => $mssqlUsername,
                  "PWD" => $mssqlPassword
                ));

                // Create MySQL connection
                $mysqlConn = mysqli_connect($mysqlServer, $mysqlUsername, $mysqlPassword, $mysqlDatabase);

                // Check if connections were successful
                if ($mssqlConn && $mysqlConn) {
                  $form_id_log = isset($_SESSION["form_id_log"]) ? $_SESSION["form_id_log"] : '';

                  // Query the MSSQL database for the data value
                  $mssqlQuery = "SELECT FINAL_WEIGHT FROM VERMI_WEB WHERE USER_NAME='$form_id_log'";
                  $mssqlResult = sqlsrv_query($mssqlConn, $mssqlQuery);
                  if ($mssqlResult !== false) {
                    $mssqlData = sqlsrv_fetch_array($mssqlResult);
                  }
                  else {
                    echo "Failed to retrieve data from MSSQL database.";
                  }

                  // Query the MySQL database for the data value
                  $mysqlQuery = "SELECT weight_value FROM tbl_weight ORDER BY weight_id DESC LIMIT 1";
                  $mysqlResult = mysqli_query($mysqlConn, $mysqlQuery);
                  if ($mysqlResult !== false) {
                    $mysqlData = mysqli_fetch_array($mysqlResult);
                  }
                  else {
                    echo "Failed to retrieve data from MySQL database.";
                  }

                  // Compare the data values
                  if (!empty($mssqlData) && !empty($mysqlData) && $mssqlData['FINAL_WEIGHT'] == $mysqlData['weight_value']) {
                    $notifmessage = "Your compost is ready for harvest.";
                    $_SESSION["notifmessage"] = $notifmessage;
                  }
                  else {
                    $notifmessage = "";
                  }
                }
                else {
                  echo "Failed to connect to MSSQL or MySQL.";
                }
                ?>
            
                <h4 class="date-notif">Today</h4>
                <th class="notif-message"><?php echo $notifmessage ?></th>
              </table>
            </div>
          </div>
        </div>
        
        <!-- PHP CODE TO DISPLAY TEMPERATURE VALUE -->
        <?php
        // Connect to the database
        $serverName = "localhost";
        $database = "vermi";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($serverName, $username, $password, $database);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the query
        $query = "SELECT temp_value FROM tbl_temp ORDER BY temp_id DESC LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);

        // Fetch the result
        $result = mysqli_stmt_get_result($stmt);

        // Check if a row is found
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $temp_value = $row['temp_value'];
        }
        else {
          // Default value if no result is found
          $temp_value = "Unknown";
        }
        ?>

        <!-- PHP CODE TO DISPLAY WEIGHT VALUE -->
        <?php
        // Connect to the database
        $serverName = "localhost";
        $database = "vermi";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($serverName, $username, $password, $database);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the query
        $query2 = "SELECT weight_value FROM tbl_weight ORDER BY weight_id DESC LIMIT 1";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_Stmt_execute($stmt2);

        // Fetch the result
        $result2 = mysqli_stmt_get_result($stmt2);

        // Check if a row is found
        if ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
          $weight_value = $row['weight_value'];
        }
        else {
          // Default value if no result is found
          $weight_value = "Unknown";
        }
        ?>

        <!-- PHP CODE TO DISPLAY MOISTURE VALUE -->
        <?php
        // Connect to the database
        $serverName = "localhost";
        $database = "vermi";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($serverName, $username, $password, $database);
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare and execute the query
        $query2 = "SELECT ROUND(((moist_sensor1+moist_sensor2+moist_sensor3+moist_sensor4)/4),0) AS moist_ave FROM tbl_moisture ORDER BY moisture_id DESC LIMIT 1;";
        $stmt2 = mysqli_prepare($conn, $query2);
        mysqli_Stmt_execute($stmt2);

        // Fetch the result
        $result2 = mysqli_stmt_get_result($stmt2);

        // Check if a row is found
        if ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
          $moist_ave = $row['moist_ave'];
        }
        else {
          // Default value if no result is found
          $moist_ave = "Unknown";
        }
        ?>

        <div class="card-deck">
          <div class="row">
            <!-- WEIGHT CARD -->
            <div class="col-md-6 col-lg-4">
              <div class="card shadow p-3 mb-5 bg-white rounded">
                <img class="card-img-top weight-img" src="images/weight.png" alt="weight.png">
                <div class="card-body">
                  <h5 class="card-title">WEIGHT</h5>
                  <p class="card-text"><?php echo $weight_value ?>kg</p>
                </div>
              </div>
            </div>
            <!-- MOISTURE CARD -->
            <div class="col-md-6 col-lg-4">
              <div class="card shadow p-3 mb-5 bg-white rounded">
                <img class="card-img-top soil-img" src="images/soil.png" alt="soilmoisture.png">
                <div class="card-body">
                  <h5 class="card-title">SOIL MOISTURE</h5>
                  <p class="card-text"><?php echo $moist_ave ?>%</p>
                </div>
              </div>
            </div>
            <!-- TEMPERATURE CARD -->
            <div class="col-md-6 col-lg-4">
              <div class="card shadow p-3 mb-5 bg-white rounded">
                <img class="card-img-top temp-img" src="images/temperature.png" alt="temperature.png">
                <div class="card-body">
                  <h5 class="card-title">TEMPERATURE</h5>
                  <p class="card-text"><?php echo $temp_value ?>°C</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>