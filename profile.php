<?php
session_start();
require ("model.php");

  if (!isset($_SESSION["login"])) {
    header("Location: loginPage.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from infinitysoftway.com/oxoury/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:32 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Infinitysoftway" />
<meta name="description" content="statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 
<!-- TITLE -->
<title>SIMP - My Profile</title>

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
										<img class="img-fluid" src="src\assets\images\team\01.jpg" alt="">
									</div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="profile-pic">
									<div class="row">
										<div class="col-8">
											<div class="profile-name">
												<h4>Luben Ivan</h4>
												<a href="#"> lubenivan@gmail.com</a>
											</div>
										</div>
										<div class="col-4">
											<div class="avatar mr-1">
												<img class="img-fluid" src="src\assets\images\team\03.jpg" alt="">
											</div>
										</div>
									</div>
								</div>
								<div class="profile-info">
									<a class="dropdown-item" href="#"> <i class="la la-edit"></i>  My Profile </a>
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
		</ul>
	</div>
	<!-- **********  main-panel  ********** -->
	<div class="main-panel">
		<div class="panel-hedding">
			<div class="row mb-4">
				<div class="col-md-6">
					<h1>My Profile</h1>
				</div>
			</div>
		</div>
		<div class="row user-profile mb-4">
			<div class="col-lg-4 mb-4 mb-lg-0">
				<div class="user-detail border-radius shadow-sm">
					<div class="avatar avatar-xll d-block mx-auto">
						<img class="img-fluid" src="src\assets\images\team\04.jpg" alt="">
					</div>
					<div class="user-name mt-3 text-center">
						<h5>Airi Satou</h5>
						<span>Web designer <strong class="text-primary"> @invision </strong></span>
					</div>
					<div class="user-info mt-4">
						<h5>User information</h5>
						<div class="my-3 ">
							<h6>Email:</h6>
							<span>airisatou@gmail.com</span>
						</div>
						<div class="my-3 ">
							<h6>Phone:</h6>
							<span>+44 7700 900684</span>
						</div>
						<div class="my-3 ">
							<h6>Address:</h6>
							<span>7809 South Sleepy Hollow Court Lititz, <br/>PA 17543</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="user-about border-radius shadow-sm">
					<div class="mb-4">
						<h5 class="mb-3">About</h5>
						<p>Aliquam minima rem voluptate veniam quae fugit ut optio eos maiores. Incidunt veritatis ducimus debitis, hic dicta a quod fuga commodi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga,</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione voluptas qui quis quas dolorum illo, perferendis. Temporibus repellat eum nesciunt fuga nulla, saepe, veniam qui a eveniet vel, tempore obcaecati.</p>
					</div>
				</div>
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

<!-- Mirrored from infinitysoftway.com/oxoury/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:32 GMT -->
</html>