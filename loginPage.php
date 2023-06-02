<?php
require("model.php");
session_start();

if (isset($_SESSION["login"])) {
  // Redirect based on user role
  if ($_SESSION["role"] === "member") {
    header("Location: projectsPage.php");
    exit;
  } else if ($_SESSION["role"] === "admin") {
    header("Location: index.php");
    exit;
  }
}

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

  // Email check
  if (mysqli_num_rows($result) === 1) {
    // Password check
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // Session set
      $_SESSION["login"] = true;
      $_SESSION["user_id"] = $row["user_id"];
      $_SESSION["full_name"] = $row["full_name"];
      $_SESSION["email"] = $row["email"];
      $_SESSION["password"] = $row["password"];
      $_SESSION["user_photo"] = $row["user_photo"];
      $_SESSION["role"] = $row["role"];

      // Redirect based on user role
      if ($_SESSION["role"] === "member") {
        header("Location: projectsPage.php");
        exit;
      } else if ($_SESSION["role"] === "admin") {
        header("Location: index.php");
        exit;
      }
    } else {
      $message = "Email or password is wrong!";
    }
  } else {
    $message = "Email not registered!";
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
<title>SIMP - Login page</title>

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
        <div class="logo-color logo-color-light">
          <div class="logo">
            <div class="logo-middle">            
              <img src="src\assets\images\logo.svg" alt="Logo"></a>
            </div>
          </div>
        </div>
        <div class="title">
          <h3>Hello There!</h3>
          <p>Welcome back, please login to you account</p>
        </div>
        <?php if (isset($message)) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong><?= $message; ?></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php endif; ?>
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
          <div class="form-bottom">
            <div class="forgot-pass">
              <a href="forgot-password-01.html"> Forgot password? </a>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Login</button>
        </form>
        <span>Doesn't have account? Create <a href="registerPage.php"><strong> Account.</strong></a></span>
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