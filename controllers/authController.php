<?php 

function verifyUser($token){
    global $conn;
    $sql = "SELECT * FROM USERS WHERE TOKEN='$token' LIMIT 1";
    $result = sqlsrv_query($conn,$sql);
}

?>