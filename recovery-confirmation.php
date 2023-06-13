<?php
session_start();
$recoveryCode = $_SESSION['recovery_code'];

// Check if the recovery code is valid or has expired
// Implement your own logic to verify the recovery code
// For example, compare it against the code entered by the user or check its expiration time
if (!isset($recoveryCode)) {
    header("Location: forgot-password-01.php");
    exit();
}

// Assuming the recovery code is valid, display the confirmation message
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
    <title>SIMP - Recovery Confirmation</title>

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
                        <h3>Recovery Confirmation</h3>
                        <p>A recovery code has been sent to your email.</p>
                    </div>
                    <p>Please check your email for the recovery code and follow the instructions provided.</p>
                </div>
            </div>
            <div class="col-lg-8 d-flex justify-content-center align-items-center">
                <div class="w-100 py-5">
                    <img class="img-fluid d-block mx-auto center-block" src="src\assets\images\confirmation.svg"
                        alt="">
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
