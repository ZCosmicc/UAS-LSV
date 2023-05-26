<?php
require ("model.php");
session_start();
  if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
  }

  if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
      echo 
      "<script>
        alert('User Successfully Registered!');
        document.location.href = 'loginPage.php';
      </script>";
    } else {
      echo 
      "<script>
        alert('User Unsuccessful to Register!');
        document.location.href = 'registerPage.php';
      </script>";
    }
  }

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from infinitysoftway.com/oxoury/sign-up-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:35 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Infinitysoftway" />
<meta name="description" content="statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 
<!-- TITLE -->
<title>SIMP - Creating an account</title>

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
          <h3>Lets get you set up!</h3>
          <p>Create your account</p>
        </div>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Register</button>
          <p class="mb-0">Already have an account? <a href="loginPage.php"> Login.</a></p>
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

<!-- Mirrored from infinitysoftway.com/oxoury/sign-up-01.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:35 GMT -->
</html>