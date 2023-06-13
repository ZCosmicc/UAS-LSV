<?php
session_start();
require("model.php");

if(isset($_POST["submit"])) {
    $email = $_POST["email"];
    if(forgotPassword(["email" => $email]) > 0) {
        $_SESSION["email"] = $email;
        echo "<script> alert('Password reset link has been sent to your email!'); </script>";
    } else {
        echo "<script> alert('Email not found!'); </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Infinitysoftway" />
    <meta name="description" content="statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- TITLE -->
    <title>SIMP - Forgot Password</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="src\assets\images\favicon.ico" />

    <!-- STYLE -->
    <link rel="stylesheet" type="text/css" href="src\style\global.css">

</head>

<body>

    <!-- **********  wrapper  ********** -->


    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-4 d-lg-flex justify-content-center align-items-center bg-light">
                <div class="login">
                    <div class="title">
                        <h3>Account recovery</h3>
                        <p>Recover your account</p>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Next</button>
                    </form>
                    <span>Don't have an account? Create one <a href="registerPage.php"><strong>here.</strong></a></span>
                </div>
            </div>
            <div class="col-lg-8 d-flex justify-content-center align-items-center">
                <div class="w-100 py-5">
                    <img class="img-fluid d-block mx-auto center-block" src="src\assets\images\error.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- **********  Wrapper  ********** -->


    <!-- **********  Javascript  ********** -->

    <!-- jquery -->
    <script src="src\js\jquery-3.6.0.min.js"></script>

    <!-- bootstrap -->
    <script src="src\js\bootstrap\bootstrap.bundle.min.js"></script>

    <!-- jquery-nicescroll -->
    <script src="src\js\jquery-nicescroll\jquery.nicescroll.min.js"></script>

    <!-- custom -->
    <script src="src\js\custom.js"></script>

</body>

</html>
