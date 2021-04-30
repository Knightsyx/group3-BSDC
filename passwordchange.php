<?php
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$email = $_POST['email'];

if(!empty($oldpassword) || !empty($newpassword) || !empty($email)){
    $host = "localhost";
    $dbUsername = "id16460650_loginusername";
    $dbPassword = "k0prEXs\!^/nPLyo";
    $dbname = "id16460650_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
      $SELECT = "SELECT password From login Where email = ? Limit 1";
      $UPDATE = "UPDATE login SET password = ? WHERE password = ?";

      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum==1) {
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("ss",  $newpassword, $oldpassword);
        $stmt->execute();
        echo "username change success";
      } else {
       echo "This password is incorrect";
      }
      $stmt->close();
      $conn->close();
     }
    }else{
        echo "All field are required";
        die();
    }
?>