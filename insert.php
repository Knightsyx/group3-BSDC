<?php
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];


if(!empty($email) || !empty($username) || !empty($password)){
    $host = "localhost";
    $dbUsername = "id16460650_loginusername";
    $dbPassword = "k0prEXs\!^/nPLyo";
    $dbname = "id16460650_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
      $SELECT = "SELECT email From login Where email = ? Limit 1";
      $INSERT = "INSERT Into login (email, username, password) values(?, ?, ?)";
      
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum==0) {
       $stmt->close();
       $stmt = $conn->prepare($INSERT);
       $stmt->bind_param("sss",  $email, $username, $password);
       $stmt->execute();
       echo " Regiseration successful";
      } else {
       echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
     }
} else{
    echo "All field are required";
    die();
}
?>