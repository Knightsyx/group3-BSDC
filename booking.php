<?php
$time = $_POST['time'];
$date = $_POST['date'];
$event = $_POST['event'];
$description = $_POST['description'];
$email = $_POST['email'];
$name = $_POST['name'];


if(!empty($time) || !empty($date) || !empty($event) || !empty($description) || !empty($email) || !empty($name)){
    $host = "localhost";
    $dbUsername = "id16460650_loginusername";
    $dbPassword = "k0prEXs\!^/nPLyo";
    $dbname = "id16460650_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else{
      $UPDATE = "UPDATE booking SET email = ?, name = ? WHERE (time = ?) AND (date = ?) AND (event = ?) AND (description = ?)";
      
      $stmt = $conn->prepare($UPDATE);
      $stmt->bind_param("ssssss", $email, $name, $time, $date, $event, $description);
      $stmt->execute();
      
      $stmt->close();
      $conn->close();
     }
    }
 else{
    echo "All field are required";
    die();
}

?>