<?php
session_start();
require ("model.php");

  if (!isset($_SESSION["login"])) {
    header("Location: loginPage.php");
    exit;
  }

  $userID = $_SESSION["user_id"];
  $userData = getUserData("users", $userID);

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
<title>SIMP - Calendar</title>

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
		<div class="row">
			<div class="col-12 col-xxl-7">
				<div class="card">
					<div class="card-title">
						<div class="card-title-left">
							<h4 class="card-title-text">Full Calendar</h4>
						</div>
					</div>
				  <div class="card-body">
				      <div id="calendar" class="fc-calendar"></div>
				  </div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="footer pb-3">
			<div class="row text-center text-md-left">
		    <div class="col-md-6">
		    	<p>Copyright © <script>document.write(new Date().getFullYear())</script> <strong><a target="_blank" href="https://www.zcostudio.tech/">SIMP | 01</a></strong> All Rights Reserved</p>
		    </div>
		    <div class="col-md-6 text-md-right">
		      <div class="footer-links">
		        <ul class="list-unstyled list-inline mb-0">
					<li class="list-inline-item"><a class="text-dark" href="mailto:zencatzcosmic@gmail.com?subject=SIMP%20-%20ASK">Contact us</a></li>
		        </ul>
		      </div>
		    </div>
		  </div>
		</footer>
		<!-- Footer -->
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

<!-- calendar -->
<script src="src/js/moment.min.js"></script>
<script src="src/js/jquery-ui/jquery-ui.min.js"></script>
<script src="src/js/calendar/fullcalendar.min.js"></script>

<!-- custom -->
<script src="src\js\custom.js"></script>

</body>

</html>