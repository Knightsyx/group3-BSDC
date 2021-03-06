<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

    <title> BSDC </title>
    <link rel="shortcut icon" type="image/png" href="img/bsdc.png" />

</head>

<body>
    <ul class="nav nav-tabs">
        <img src="img/bsdc.png" alt="BSDC logo" width="100" height="60">
        <li class="nav-item">
            <a class="nav-link mt-4" aria-current="page" href="Home Page.html">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mt-4" href="Events Page.html">Events</a>
        </li>
        <li class="nav-item">
            <a class="nav-link mt-4" href="My Bookings Page.html">My Bookings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active mt-4" href="Login Page.html">Login/Sign Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active mt-4" href="Login Page.html"><?php echo $_SESSION['name']; ?></a>
        </li>

    </ul>


   




      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <div class="card border-primary mb-3 mt-3 d-flex mx-auto" style="max-width: 18rem;">
            <div class="card-header fs-1">Log In</div>
            <div class="card-body text-primary">
                <div class="row">
                    <form action="login.php" method="POST">
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "email" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">password</label>
                          <input type="password" class="form-control" id="exampleInputEmail1" name = "password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>