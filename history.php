<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <title>Temperature History</title>
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
    <link rel="stylesheet" href="history.css">
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
          <a href="dashboard.php">Dashboard</a>
        </li>
        <li class="tab-two">
          <a class="active" href="history.php">History</a>
        </li>
        <li class="tab-three">
          <a href="profile.php">My Profile</a>
        </li>
        <li class="tab-four">
          <a href="loginpage.php">Logout</a>
        </li>
      </ul>
    </section>

    <!------------------------------------------------------ TEMP HISTORY CONTENT -------------------------------------------------------->
    <section id="content">
      <div id="History" class="tabcontent">
        <div class="row">
          <!-- TEMPERATURE TITLE AND BUTTONS -->
          <div class="col-md-6 div-dashboard">
            <h3 class="dashboard-text">TEMPERATURE HISTORY</h3>
            <div class="value-button">
              <button class="temp-button" onclick="location.href = 'history.php'">Temperature</button>
              <button class="moist-button" onclick="location.href = 'historymoist.php'">Moisture</button>
              <button class="weight-button" onclick="location.href = 'historyweight.php'">Weight</button>
            </div>
          </div>
          <!-- NOTIFICATION BELL -->
          <div class="col-md-6 div-dropdown">
            <a class="nav-link dropdown-style" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa-solid fa-solid fa-bell bars-style"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-right menu-style" aria-labelledby="navbarDropdownMenuLink">
            <table>
              <h4 class="date-notif">Today</h4>
              <!-- PHP CODE TO GET THE NOTIFICATIONS ON THIS PHP FILE -->
              <?php
              session_start();
              // Start the session and access the session variable
              $notifmessage = isset($_SESSION['notifmessage']) ? $_SESSION['notifmessage'] : '';
              $notifmessage1 = isset($_SESSION['notifmessage1']) ? $_SESSION['notifmessage1'] : '';
              ?>
              
              <th class="notif-message"><?php echo $notifmessage ?></th>
            </table>
          </div>
        </div>
      </div>

      <?php
      $serverName = "localhost";
      $database = "vermi";
      $username = "root";
      $password = "";

      $conn = mysqli_connect($serverName, $username, $password, $database);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      // Getting Total List and Initialize the date filter variable
      $dateFilter = "";

      if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
        // Get the start date and end date from the form
        $startDate = $_GET['start_date'];
        $endDate = $_GET['end_date'];

        // Format the dates in YYYY-MM-DD format (assuming your database stores dates in this format)
        $startDate = date('Y-m-d', strtotime($startDate));
        $endDate = date('Y-m-d', strtotime($endDate . '+1 day'));

        // Construct the date filter condition
        $dateFilter = " WHERE temp_date_time >= '$startDate' AND temp_date_time < '$endDate'";
      }

      $sql = "SELECT * FROM tbl_temp" . $dateFilter;
      $result = mysqli_query($conn, $sql);

      if (!$result) {
        die("Query failed: " . mysqli_error($conn));
      }
      ?>

      <!-- FORM TO FILTER DATES -->
      <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>">

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>">

        <input type="submit" value="Filter">
      </form>

      <table>
        <tr>
          <th>DATE AND TIME</th>
          <th>TEMPERATURE VALUE</th>
        </tr>

        <!-- PHP CODE TO DISPLAY THE TABLES -->
        <?php
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $fieldname3 = $row['temp_date_time'];
          $fieldname2 = $row['temp_value'];
          echo '<tr>
            <td>' . $fieldname3 . '</td>
            <td>' . $fieldname2 . '°C</td>
          </tr>';
        }
        ?>

      </table>
    </section>
  </body>
</html>