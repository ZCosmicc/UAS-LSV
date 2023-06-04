<?php
session_start();
require ("model.php");

  if (!isset($_SESSION["login"])) {
    header("Location: loginPage.php");
    exit;
  }

  $userID = $_SESSION["user_id"];
  $userData = getUserData("users", $userID);

  if(isset($_POST["submit"])) {
	if(updateUserProfile($_POST) > 0) {
	  echo "
		<script>
		  alert('Profile successfully edited!');
		  document.location.href = 'profile.php';
		</script>
	  ";
	} else {
	  echo "
		<script>
		  alert('Profile failed to edit!');
		</script>
	  ";
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
<title>SIMP - Edit Profile</title>

<!-- FAVICON -->
<link rel="shortcut icon" href="src\assets\images\favicon.ico" />

<!-- STYLE -->
<link rel="stylesheet" type="text/css" href="src\style\global.css">

</head>

<body>

<!-- **********  HEADER  ********** -->

<header class="header header-fixed header-light">
	<div class="header-middle">                 
		<div class="logo-color logo-color-light">
			<div class="logo">
				<div class="logo-middle">            
					<a href="index.php"><img src="src\assets\images\logo.svg" alt="Logo"></a>
				</div>
			</div>
		</div>
		<div class="header-topbar">
			<div class="topbar-left">
				<a class="side-toggle" href="#!">
					<i class="la la-bars"></i>	
				</a>
			</div>
			<div class="topbar-right">
				<ul>
						<li class="dropdown show notifications">
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span>
									<span class="notifications-badge"></span>
									<i class="la la-bell"></i>
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="notifications-title">
									<div class="row">
										<div class="col-8">
											<h4>Notifications</h4>
											<p class="mb-0"> 2 unread notification</p>
										</div>
										<div class="col-4">
											<span class="badge badge-light">56 new</span>
										</div>
									</div>
								</div>
								<ul class="list-unstyled">
									<li>
										<div class="media">
											<div class="avatar avatar-sm mr-3">
												<img class="img-fluid" src="src\assets\images\team\01.jpg" alt="">
											</div>
											<div class="media-body">
												
												<a href="#"> <b>Sed do </b> eiusmod tempor <span class="text-primary">labore</span> </a>
												<span> <i class="fa fa-check-circle text-success"></i> 12 min ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="media">
											<div class="avatar avatar-sm mr-3">
												<img class="img-fluid" src="src\assets\images\team\02.jpg" alt="">
											</div>
											<div class="media-body">
												<a href="#"> Ut enim ad <b>minim</b> veniam nostrud </a>
												<span> <i class="fa fa-arrow-circle-up text-info"></i> 40 min ago</span>
											</div>
										</div>
									</li>
									<li>
										<div class="media">
											<div class="avatar avatar-sm mr-3">
												<img class="img-fluid" src="src\assets\images\team\03.jpg" alt="">
											</div>
											<div class="media-body">
												<a href="#"> <b>Ullamco</b> laboris nisi ut aliquip </a>
												<span> <i class="fa fa-plus-circle text-danger"></i> 12 hr ago</span>
											</div>
										</div>
									</li>
									<li class="text-center">
										<a class="link" href="#">View all notification</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="dropdown show user-profile">
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="avatar avatar-sm mr-1">
										<img class="img-fluid" src="src\assets\images\team\<?php echo $userData["user_photo"] ?>" alt="">
									</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="profile-pic">
									<div class="row">
										<div class="col-8">
											<div class="profile-name">
												<h4><?php echo $userData["full_name"]; ?></h4>
												<a href="#"><?php echo $userData["email"]; ?></a>
											</div>
										</div>
										<div class="col-4">
											<div class="avatar mr-1">
												<img class="img-fluid" src="src\assets\images\team\<?php echo $userData["user_photo"] ?>" alt="">
											</div>
										</div>
									</div>
								</div>
								<div class="profile-info">
									<a class="dropdown-item" href="profile.php"> <i class="la la-edit"></i>  My Profile </a>
									<a class="dropdown-item" href="#"> <i class="la la-refresh"></i> Notifications <span class="badge badge-danger float-right">03</span></a>
									<div class="separator my-2"></div>
									<a class="btn btn-outline-primary outline-gray btn-sm mt-3" href="logout.php"> <i class="la la-power-off"></i> Logout </a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</header>

<!-- **********  HEADER  ********** -->


<!-- **********  WRAPPER  ********** -->

<div class="wrapper">
	<div class="sidebar-panel nicescrollbar sidebar-panel-light">
		<ul class="sidebar-menu">
		  <li class="sidebar-header"> Navigation </li>
		  <?php if ($_SESSION["role"] === "admin"): ?>
			<li>
			  <a href="index.php">
				<i class="la la-home"></i> <span>Dashboard</span>
			  </a>
			</li>
		  <?php elseif ($_SESSION["role"] === "member"): ?>
			<li class="hidden-item">
			</li>
		  <?php endif; ?>
		  <li>
			<a href="projectsPage.php">
			  <i class="la la-file"></i> <span>Projects</span>
			</a>
		  </li>
		  <li>
			<a href="calendar-list.php">
			  <i class="la la-calendar"></i> <span>Calendar</span>
			</a>
		  </li>
		  <li>
			<a href="editProfile.php">
			  <i class="la la-gear"></i> <span>Account Settings</span>
			</a>
		  </li>
		</ul>
	</div>
	<!-- **********  main-panel  ********** -->
	<div class="main-panel">
		<div class="panel-hedding">
			<div class="row mb-4">
				<div class="col-md-6">
					<h1>Edit Profile</h1>
				</div>
			</div>
		</div>
		<div class="row user-profile mb-4">
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="card user-detail border-radius shadow-sm">
					<div class="avatar avatar-xll d-block mx-auto">
						<img class="img-fluid" src="src\assets\images\team\<?php echo $userData["user_photo"] ?>" alt="">
					</div>
					<form method="post" enctype="multipart/form-data">
					<div class="user-name mt-3 text-center">
						<h5 class="mb-4">User information</h5>
						<input type="text" class="form-control mb-3" name="full_name" value="<?php echo $userData["full_name"]; ?>" required>
						<span><strong class="text-primary mt-3"><?php echo $userData["role"]; ?></strong></span>
					</div>
					<div class="user-info mt-4">

							<div class="my-3 "><h6>Position:</h6></div>
							<div class="form-group">
								<input type="text" class="form-control" name="position" value="<?php echo $userData['position']; ?>" required>
							</div>
							<div class="my-3 "><h6>Email:</h6></div>
							<div class="form-group">
								<input type="text" class="form-control" name="email" value="<?php echo $userData['email']; ?>" required>
							</div>
							<div class="my-3 "><h6>Phone Number:</h6></div>
							<div class="form-group">
								<input type="text" class="form-control" name="phone_number" value="<?php echo $userData['phone_number']; ?>" required>
							</div>
							<div class="my-3 "><h6>Address:</h6></div>
							<div class="form-group">
								<input type="text" class="form-control" name="address" value="<?php echo $userData['address']; ?>" required>
							</div>
							<div class="my-3 "><h6>Gender:</h6></div>
							<div class="custom-control custom-radio custom-control-inline">
				  				<input type="radio" id="male" name="gender" value="male" class="custom-control-input" <?php echo $userData['gender'] == 'male' ? 'checked' : '' ?>>
				  				<label class="custom-control-label" for="male">Male</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
				  				<input type="radio" id="female" name="gender" value="female" class="custom-control-input" <?php echo $userData['gender'] == 'female' ? 'checked' : '' ?>>
				  				<label class="custom-control-label" for="female">Female</label>
							</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card user-about border-radius shadow-sm mb-5">
					<div class="mb-4">
						<h5 class="mb-3">About</h5>
						<textarea type="text" class="form-control" name="about" required><?php echo $userData['about']; ?></textarea>
					</div>
				</div>
				<div class="card">
					<div class="card-title">
						<div class="card-title-left">
							<h4 class="card-title-text">Upload Image</h4>
						</div>
					</div>
				 	<div class="card-body">
					  <div class="custom-file">
						  <input type="file" class="custom-file-input" id="user_photo" name="user_photo" accept="image/*">
						  <label class="custom-file-label" for="user_photo">Choose file</label>
						</div>
					</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary mt-4">Save Changes</button>
			</div>
			</form>
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