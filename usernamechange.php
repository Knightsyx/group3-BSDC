<?php
$oldusername = $_POST['oldusername'];
$newusername = $_POST['newusername'];
$email = $_POST['email'];

if(!empty($oldusername) || !empty($newusername) || !empty($email)){
    $host = "localhost";
    $dbUsername = "id16460650_loginusername";
    $dbPassword = "k0prEXs\!^/nPLyo";
    $dbname = "id16460650_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
      $SELECT = "SELECT username From login Where email = ? Limit 1";
      $UPDATE = "UPDATE login SET username = ? WHERE username = ?";

      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum==1) {
        $stmt = $conn->prepare($UPDATE);
        $stmt->bind_param("ss",  $newusername, $oldusername);
        $stmt->execute();
        echo "username change success";
      } else {
       echo "This username doesnt exist";
      }
      $stmt->close();
      $conn->close();
     }
    }else{
        echo "All field are required";
        die();
    }
?>