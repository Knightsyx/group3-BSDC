<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) || !empty($password)){
    $host = "localhost";
    $dbUsername = "id16460650_loginusername";
    $dbPassword = "k0prEXs\!^/nPLyo";
    $dbname = "id16460650_login";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error()){
        die('connect error: '. mysqli_connect_error());
    } else{
        $SELECT = "SELECT * FROM login WHERE email = ? LIMIT 1";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $fetchedData = $stmt->get_result();
        if ($fetchedData->num_rows == 1){
            while ($data = $fetchedData->fetch_assoc()) {
                if ($password == $data['password']){
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $data['username'];
                        
                    header('Location: https://theneilwebappandcrystalwebsitemaybe.000webhostapp.com/test.php');
                } else {
                    echo "not right password dummy";
                }
            }
        } else {
            echo "no email there boss man";
        }
    } 
}

$stmt->close();
$conn->close();
?>