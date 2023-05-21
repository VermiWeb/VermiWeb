<?php
session_start();
// Connect to the database
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

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token){
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth = true;

  $mail->Host = "smtp.gmail.com";
  $mail->Username = "hazeltiffany.taylo.2342@gmail.com";
  $mail->Password= "***";

  $mail->SMTPSecure = "tls";
  $mail->Port = 587;

  $mail->setFrom("hazeltiffany.taylo.2342@gmail.com",$get_name);
  $mail->addAddress($get_email);

  $mail->isHTML(true);
  $mail->Subject = "Reset Password Notification";

  $email_template = "
    <h2>Hello</h2>
    <h3>You are receiving this email because we received a password reset request for your account.</h3>
    <br><br>
    <a href='http://localhost/webapp/VermiWeb/forgotpasswordchange.php?token=$token&email=$get_email'> Click Me </a>";

    $mail->Body = $email_template;
    $mail->send();
}

if(isset($_POST['signin-button'])){
  $email = $_POST['email'];
  $token = rand();

  $check_email = "SELECT USER_EMAIL FROM VERMI_WEB WHERE USER_EMAIL='$email'";
  $check_email_run = sqlsrv_query($conn,$check_email);

  if(sqlsrv_has_rows($check_email_run)>0){
    $row = array($check_email_run);
    $get_name = $row['USER_NAME'];
    $get_email = $row['USER_EMAIL'];

    $update_token = "UPDATE VERMI_WEB SET VERIFY_TOKEN='$token' WHERE USER_EMAIL='$get_email'";
    $update_token_run = sqlsrv_query($conn, $update_token);

    if($update_token_run){
      send_password_reset($get_name,$get_email,$token);
      $_SESSION['status'] = "We emailed you a password reset link.";
      header("Location: forgotpassword.php");
      exit(0);
    }
    else{
      $_SESSION['status'] = "Something went wrong! #1";
      header("Location: forgotpassword.php");
      exit(0);
    }
  }
  else{
    $_SESSION['status'] = "No Email Found";
    header("Location: forgotpassword.php");
    exit(0);
  }
}
?>