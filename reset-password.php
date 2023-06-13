<?php
session_start();
require("model.php");

//check when url has token or not
if(!isset($_GET["token"]) || !checkToken($_GET["token"])) {
    header("Location: error-02.html");
}

if (isset($_POST["submit"])) {
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($newPassword === $confirmPassword) {
        if (resetPassword($newPassword, $confirmPassword)) {
                    echo "<script> alert('Password has been reset!'); </script>";
                    echo "<script> window.location.href = 'loginPage.php'; </script>";
                    exit; // Exit after redirecting to prevent further execution
        } else {
            echo "<script> alert('Failed to reset password!'); </script>";
        }
    } else {
        echo "<script> alert('Password does not match!'); </script>";
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
    <title>SIMP - Reset Password</title>

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
                        <h3>Reset Password</h3>
                        <p>Set your new password</p>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="newPassword" placeholder="Enter your new password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm your new password" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Reset Password</button>
                    </form>
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