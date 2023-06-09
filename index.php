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

<!-- Mirrored from infinitysoftway.com/oxoury/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 13:59:28 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Infinitysoftway" />
<meta name="description" content="statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 
<!-- TITLE -->
<title>SIMP - Dashboard</title>

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
					<a href="index.html"><img src="src\assets\images\logo.svg" alt="Logo"></a>
				</div>
			</div>
		</div>
		<div class="header-topbar">
			<div class="topbar-left">
				<a class="side-toggle" href="#!">
					<i class="la la-bars"></i>	
				</a>
				<div class="search-box">
					<div class="search">
						<input class="form-control border-0" type="search" placeholder="Type something..." aria-label="Search">
						<a href="#">	<i class="la la-search"></i> </a>
					</div>
				</div>
			</div>
			<div class="topbar-right">
				<ul>
					<li class="dropdown show language">
						<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span> <i class="flag-icon flag-icon-us"></i></span>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="language-title">
								<h5 class="mb-0">Language choose</h5>
							</div>
							<div class="language-choose">
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-us"></i>USA</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Germany</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i>France</a>
								<a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i>China</a>
							</div>
						</div>
					</li>
					<li class="dropdown show setting">
						<a id="showRight" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span> <i class="la la-tasks"></i></span>
						</a>
						<div class="animate-menu animate-menu-right right-sidebar">
							<div class="tab">
								<ul class="nav nav-pills" id="myTab-01" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="chat-tab-01" data-toggle="tab" href="#chat-01" role="tab" aria-controls="chat-01" aria-selected="false"> Chat</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="projects-tab-01" data-toggle="tab" href="#projects-01" role="tab" aria-controls="projects-01" aria-selected="true">Projects</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="contact-tab-01" data-toggle="tab" href="#contact-01" role="tab" aria-controls="contact-01" aria-selected="false"> Todo </a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent-01">
									<div class="tab-pane fade show active" id="chat-01" role="tabpanel" aria-labelledby="chat-tab-01">
										<div class="sidebar-chat">
											<div class="mb-4">
												<h5>Connections</h5>
												<p>Blanditiis explicabo facilis ducimus</p>
											</div>
											<div class="list-group-item">
												<div class="media">
													<div class="avatar avatar-sm mr-3">
														<span class="status badge-success"></span>
														<img class="img-fluid" src="src\assets\images\team\01.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="messages-name">
															<h6><a href="#">Lael Greer</a></h6>
															<span class="text-light">Excepturi dicta vero animi...</span>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item">
												<div class="media">
													<div class="avatar avatar-sm mr-3">
														<span class="status badge-danger"></span>
														<img class="img-fluid" src="src\assets\images\team\02.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="messages-name">
															<h6><a href="#">Olivia Liang </a></h6>
															<span class="text-light">Ut enim ad minim veniam nostrud...</span>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item">
												<div class="media">
													<div class="avatar avatar-sm mr-3">
														<span class="status badge-danger"></span>
														<img class="img-fluid" src="src\assets\images\team\03.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="messages-name">
															<h6><a href="#">Jena Gaines	 </a></h6>
															<span class="text-light">Exercitation ullamco laboris nisi...</span>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item">
												<div class="media">
													<div class="avatar avatar-sm mr-3">
														<span class="status badge-success"></span>
														<img class="img-fluid" src="src\assets\images\team\04.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="messages-name">
															<h6><a href="#">Cedric Kelly </a></h6>
															<span class="text-light">Ut aliquip ex ea consequat...</span>
														</div>
													</div>
												</div>
											</div>
											<div class="list-group-item border-0">
												<div class="media">
													<div class="avatar avatar-sm mr-3">
														<span class="status badge-success"></span>
														<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
													</div>
													<div class="media-body">
														<div class="messages-name">
															<h6><a href="#">Bruno Nash </a></h6>
															<span class="text-light">Integer molestie lorem at massa...</span>
														</div>
													</div>
												</div>
											</div>
											<div class="chat-contact mt-4">
												<div class="mb-4">
													<h5>Contacts</h5>
												</div>
												<ul class="list-unstyled list-inline">
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\01.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-danger"></span>
															<img class="img-fluid" src="src\assets\images\team\02.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-danger"></span>
															<img class="img-fluid" src="src\assets\images\team\03.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm bg-warning">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\09.png" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm bg-secondary">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\10.png" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-danger"></span>
															<img class="img-fluid" src="src\assets\images\team\04.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\06.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-danger"></span>
															<img class="img-fluid" src="src\assets\images\team\07.jpg" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm bg-info">
															<span class="status badge-danger"></span>
															<img class="img-fluid" src="src\assets\images\team\08.png" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\11.png" alt="">
														</div>
													</li>
													<li>
														<div class="avatar avatar-sm bg-success">
															<span class="status badge-success"></span>
															<img class="img-fluid" src="src\assets\images\team\12.png" alt="">
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="projects-01" role="tabpanel" aria-labelledby="projects-tab-01">
										<div class="sidebar-project">
											<div class="project-item">
												<div class="project-title">
													<div class="project-title-left">
														<h5 class="mb-3"> <a href="#!"> Application development </a></h5>
														<span class="badge badge-overlay-danger">Pending</span>
													</div>
												</div>
												<div class="project-comments mt-2">
													<p>Officia nam sed possimus repellat et, assumenda corporis velit.</p>
												</div>
												
												<div class="project-status mt-3">
													<div class="project-status-label ">
														<span>Completed</span>
														<span>60%</span>
													</div>
													<div class="progress progress-h-5">
														<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-12">
														<div class="project-deadline">
															<h6 class="mb-2 d-inline-block">End date: </h6>
															<p class="d-inline-block">10/01/2021</p>
														</div>
													</div>
												</div>
											</div>
											<div class="project-item">
												<div class="project-title">
													<div class="project-title-left">
														<h5 class="mb-3"> <a href="#!">  Application Testing  </a></h5>
														<span class="badge badge-overlay-success">Active</span>
													</div>
												</div>
												<div class="project-comments mt-2">
													<p>Assumenda corporis velit? Dicta et tenetur.</p>
												</div>
												
												<div class="project-status mt-3">
													<div class="project-status-label ">
														<span>Completed</span>
														<span>80%</span>
													</div>
													<div class="progress progress-h-5">
														<div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-12">
														<div class="project-deadline">
															<h6 class="mb-2 d-inline-block">End date: </h6>
															<p class="d-inline-block">10/06/2021</p>
														</div>
													</div>
												</div>
											</div>
											<div class="project-item">
												<div class="project-title">
													<div class="project-title-left">
														<h5 class="mb-3"> <a href="#!"> UI design </a></h5>
														<span class="badge badge-overlay-success">Active</span>
													</div>
												</div>
												<div class="project-comments mt-2">
													<p>Tepellat et, assumenda corporis velit? Dicta et tenetur.</p>
												</div>
												
												<div class="project-status mt-3">
													<div class="project-status-label ">
														<span>Completed</span>
														<span>72%</span>
													</div>
													<div class="progress progress-h-5">
														<div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-12">
														<div class="project-deadline">
															<h6 class="mb-2 d-inline-block">End date: </h6>
															<p class="d-inline-block">30/03/2021</p>
														</div>
													</div>
												</div>
											</div>
											<div class="project-item">
												<div class="project-title">
													<div class="project-title-left">
														<h5 class="mb-3"> <a href="#!"> App design </a></h5>
														<span class="badge badge-overlay-danger">Pending</span>
													</div>
												</div>
												<div class="project-comments mt-2">
													<p>Dicta et tenetur consequatur. officia nam sed possimus.</p>
												</div>
												
												<div class="project-status mt-3">
													<div class="project-status-label ">
														<span>Completed</span>
														<span>60%</span>
													</div>
													<div class="progress progress-h-5">
														<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<div class="row mt-4">
													<div class="col-12">
														<div class="project-deadline">
															<h6 class="mb-2 d-inline-block">End date: </h6>
															<p class="d-inline-block">14/05/2021</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="contact-01" role="tabpanel" aria-labelledby="contact-tab-01">
										<div class="sidebar-setting">
											<h5 class="mb-4"> General settings </h5>
											<div class="account-setting pb-3">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck1">
													<label class="custom-control-label" for="customCheck1">Report panel usage</label>
												</div>
											</div>
											<div class="account-setting pb-3">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck2">
													<label class="custom-control-label" for="customCheck2">Mail redirect</label>
												</div>
											</div>
											<div class="account-setting pb-3">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck3">
													<label class="custom-control-label" for="customCheck3">Expose author name</label>
												</div>
											</div>
											<div class="account-setting pb-3">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="customCheck4">
													<label class="custom-control-label" for="customCheck4">Save History</label>
												</div>
											</div>
											<h5 class="mb-4 mt-5"> Account settings </h5>
											<div class="account-setting">
												<h6>Notifications</h6>
												<label class="switch ">
													<input type="checkbox" class="primary" checked="">
													<span class="slider round name"></span>
												</label>
											</div>
											<div class="account-setting">
												<h6>Show Online</h6>
												<label class="switch ">
													<input type="checkbox" class="primary" >
													<span class="slider round name"></span>
												</label>
											</div>
											<div class="account-setting">
												<h6>Cloud Sync</h6>
												<label class="switch ">
													<input type="checkbox" class="primary" checked="">
													<span class="slider round name"></span>
												</label>
											</div>
											<div class="account-setting">
												<h6>Status</h6>
												<label class="switch ">
													<input type="checkbox" class="primary">
													<span class="slider round name"></span>
												</label>
											</div>
											<h5 class="mb-4 mt-5"> CPU status </h5>
											<span> % Utilization</span>
											<div class="progress progress-h-5 mt-2">
												<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</li>
						<li class="dropdown show messages">
							<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span>
									<span class="messages-badge"></span>
								<i class="la la-comment"></i></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="messages-title">
									<div class="row">
										<div class="col-8">
											<h4>Messages</h4>
											<p class="mb-0"> 12 unread messages</p>
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
												<span class="status badge-success"></span>
												<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
											</div>
											<div class="media-body">
												<div class="messages-name">
													<a href="#">Airi Satou </a>
													<span class="time-date"> 12 min ago</span>
												</div>
												<p>Excepturi dicta tempora vero animi...</p>
												<div class="messages-replay">
													<a class="link" href="#"> <i class="la la-mail-reply"></i> Reply</a>
													<a class="link" href="#"> <i class="la la-eye"></i> Read</a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="media">
											<div class="avatar avatar-sm mr-3">
												<img class="img-fluid" src="src\assets\images\team\07.jpg" alt="">
											</div>
											<div class="media-body">
												<div class="messages-name">
													<a href="#">Jena Gaines </a>
													<span class="time-date"> 12 hr ago</span>
												</div>
												<p>Exercitation ullamco laboris nisi...</p>
												<div class="messages-replay">
													<a class="link" href="#"> <i class="la la-mail-reply"></i> Reply</a>
													<a class="link" href="#"> <i class="la la-eye"></i> Read</a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="media">
											<div class="avatar avatar-sm mr-3">
												<span class="status badge-success"></span>
												<img class="img-fluid" src="src\assets\images\team\03.jpg" alt="">
											</div>
											<div class="media-body">
												<div class="messages-name">
													<a href="#">Lael Greer</a>
													<span class="time-date"> 30 hr ago</span>
												</div>
												<p>Ut aliquip ex ea commodo...</p>
												<div class="messages-replay">
													<a class="link" href="#"> <i class="la la-mail-reply"></i> Reply</a>
													<a class="link" href="#"> <i class="la la-eye"></i> Read</a>
												</div>
											</div>
										</div>
									</li>
									<li class="text-center">
										<a class="link" href="#">View all notification</a>
									</li>
								</ul>
							</div>
						</li>
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
									<a class="dropdown-item" href="#"> <i class="la la-refresh"></i> Inbox <span class="badge badge-danger float-right">03</span></a>
									<a class="dropdown-item" href="#"> <i class="la la-star-o"></i>  Favorites </a>
									<a class="dropdown-item" href="#"> <i class="la la-wechat"></i>  Downloads </a>
									<div class="separator my-2"></div>
									<a class="dropdown-item" href="#"> <i class="la la-cog"></i> Account Setting </a>
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
        <li>
          <a href="index.html">
            <i class="la la-home"></i> <span>Dashboard</span>
          </a>
        </li>
      <li>
        <a href="projectsPage.html">
          <i class="la la-file"></i> <span>Projects </span>
        </a>
      </li>
    </ul>
  </div>
  <!-- **********  main-panel  ********** -->
	<div class="main-panel">
		<div class="panel-hedding">
			<div class="row">
				<div class="col-lg-3">
					<h1>Hello, Project Manager</h1>
					<p>Welcome Back!</p>
				</div>
				<div class="col-lg-7">
					<div class="alert bg-white shadow-sm alert-dismissible fade show mb-0" role="alert">
						<i class="feather icon-alert-triangle text-primary mr-2"></i> Welcome back,  Project Manager!  Your last sign in at Yesterday, 16:54 PM
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
					</div>
				</div>
				<div class="col-lg-2">
					<div class="add-new">
						<a class="btn btn-primary" href="#!"> <i class="feather icon-plus"></i> Add new</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 mt-4 mt-lg-5">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Recent revenue</h4>
							</div>
						</div>
						<div class="card-body">
							<div id="revenue-chart">
					    </div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mt-lg-5">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Top Sales</h4>
							</div>
						</div>
						<div class="card-body">
							<div id="sale-chart"></div>
					    <div class="pt-4">
									<div class="d-flex w-100"> 
										<span class="text-light font-weight-normal"><i class="fa fa-circle pr-2 text-primary"></i> 44 not sent</span>
										<span class="ml-auto text-light font-weight-normal"><i class="fa fa-circle pr-2 text-primary"></i> 44 opened</span>
									</div>
									<div class="d-flex w-100 mt-4"> 
										<span class="text-light font-weight-normal"><i class="fa fa-circle pr-2 text-primary"></i> 44 success</span>
										<span class="ml-auto text-light font-weight-normal"><i class="fa fa-circle pr-2 text-primary"></i> 44 SMTP error</span>
									</div> 
									<a class="btn btn-light btn-block mt-4" href="#">View more</a>
									<p class="text-center mt-5">The secret of getting ahead is getting started</p>
								</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 mt-lg-5">
					<div class="card mb-4 h-auto overflow-hidden">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Downloads</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="d-flex align-items-end">
								<div class="mr-3">
									<h3>10M</h3>
									<span>Views</span>
									</div>

							<div id="download-chart">
							</div>
						</div>
					</div>
					</div>
					<div class="card h-auto">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Our Projects</h4>
							</div>
						</div>
						<div class="card-body">
					     <div class="project-item">
									<div class="project-title">
										<div class="project-title-left">
											<h5 class="mb-3"> <a href="#!"> Application development </a></h5>
											<span class="badge badge-overlay-danger">Pending</span>
										</div>
									</div>
									<div class="project-comments mt-1">
										<p>Officia nam sed possimus repellat et, assumenda corporis velit.</p>
									</div>
									
									<div class="project-status mt-2">
										<div class="project-status-label ">
											<span>Completed</span>
											<span>60%</span>
										</div>
										<div class="progress progress-h-5">
											<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="row mt-4">
										<div class="col-12">
											<div class="project-deadline">
												<h6 class="mb-2 d-inline-block">End date: </h6>
												<p class="d-inline-block">10/01/2021</p>
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
			</div>
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">To do task</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="todo-task">
								<div class="search-box mb-2">
									<a href="#"> <i class="la la-align-left"></i>  </a>
									<input class="form-control border-0" type="search" placeholder="Add a task..." aria-label="Search">
								</div>
								<ul class="list-group">
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck11">
											<label class="custom-control-label" for="customCheck11"> New project wireframes</label>
											<p class="task-status">Before 5pm, completed 60%</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck12" checked>
											<label class="custom-control-label" for="customCheck12"> Today bug fixed</label>
											<p class="task-status">Letter in progress</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck13">
											<label class="custom-control-label" for="customCheck13"> Update landing page</label>
											<p class="task-status">Progress</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck14">
											<label class="custom-control-label" for="customCheck14"> Reading about face 5</label>
											<p class="task-status">Before 4pm, completed 85%</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck15" checked>
											<label class="custom-control-label" for="customCheck15"> Design cart page</label>
											<p class="task-status">Completed 100%</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
									<li class="list-group-item mb-1">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="customCheck16">
											<label class="custom-control-label" for="customCheck16"> New project wireframes</label>
											<p class="task-status">Before 5pm, completed 60%</p>
										</div>
										<div class="task-action">
											<ul class="list-unstyled">
												<li> <a href="#!"> <i class="la la-edit"></i> </a> </li>
												<li> <a href="#!"> <i class="la la-trash-o"></i> </a> </li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Support tickets</h4>
							</div>
							<div class="card-title-right">
								<a class="btn btn-primary btn-sm" href="#">Create a ticket</a>
							</div>
						</div>
						<div class="card-body">
							<div class="support-ticket">
								<a class="ticket-item" href="#">
									<div class="avatar avatar-xl bg-soft-primary">
										<span class="avatar-name text-primary">OX</span>
									</div>
									<div class="ticket-info">
										<span class="text-light ticket-customer">@airi_satou </span>
										<span class="badge badge-overlay-danger">Bug</span>
										<h5 class="title mt-2">Post Title under Post Image</h5>
										<p class="text-light mb-0">Doloribus totam non impedit ipsa, aut rem sit earum illo....</p>
									</div>
									<div class="ticket-time text-right">
										<span><i class="la la-calendar-o"></i> 2 hours ago</span>
										<span><i class="la la-comment-o"></i>  5</span>
									</div>
								</a>
								<a class="ticket-item" href="#">
									<div class="avatar avatar-xl bg-soft-primary">
										<span class="avatar-name text-primary">SM</span>
									</div>
									<div class="ticket-info">
										<span class="text-light ticket-customer">@cedric_kelly</span>
										<span class="badge badge-overlay-success">Question</span>
										<h5 class="title mt-2">Sicial media link problems</h5>
										<p class="text-light mb-0">Doloribus totam non impedit ipsa, aut rem sit earum illo....</p>
									</div>
									<div class="ticket-time text-right">
										<span><i class="la la-calendar-o"></i> 3 hours ago</span>
										<span><i class="la la-comment-o"></i>  2</span>
									</div>
								</a>
								<a class="ticket-item" href="#">
									<div class="avatar avatar-xl bg-soft-primary">
										<span class="avatar-name text-primary">DC</span>
									</div>
									<div class="ticket-info">
										<span class="text-light ticket-customer">@jena_gaines </span>
										<span class="badge badge-overlay-danger">Bug</span>
										<h5 class="title mt-2">Category page</h5>
										<p class="text-light mb-0">Doloribus totam non impedit ipsa, aut rem sit earum illo....</p>
									</div>
									<div class="ticket-time text-right">
										<span><i class="la la-calendar-o"></i> 6 hours ago</span>
										<span><i class="la la-comment-o"></i>  10</span>
									</div>
								</a>
								<a class="ticket-item" href="#">
									<div class="avatar avatar-xl bg-soft-primary">
										<span class="avatar-name text-primary">BA</span>
									</div>
									<div class="ticket-info">
										<span class="text-light ticket-customer">@tiger_nixon</span>
										<span class="badge badge-overlay-info">Mega menu</span>
										<h5 class="title mt-2">Sicial media link problems</h5>
										<p class="text-light mb-0">Doloribus totam non impedit ipsa, aut rem sit earum illo....</p>
									</div>
									<div class="ticket-time text-right">
										<span><i class="la la-calendar-o"></i> 10 hours ago</span>
										<span><i class="la la-comment-o"></i>  4</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">New Registered Users </h4>
							</div>
						</div>
						<div class="card-body">
							<div class="user">
								<div class="user-item">
									<div class="avatar avatar-md mr-3">
										<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Airi Satou </a> </h6>
										<span> airisatou@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
								<div class="user-item">
									<div class="avatar avatar-md mr-3 bg-secondary">
										<img class="img-fluid" src="src\assets\images\team\13.png" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Bruno Nash	 </a> </h6>
										<span> brunonash@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
								<div class="user-item">
									<div class="avatar avatar-md mr-3">
										<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Cedric Kelly </a> </h6>
										<span> cedrickelly@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
								<div class="user-item">
									<div class="avatar avatar-md mr-3">
										<img class="img-fluid" src="src\assets\images\team\02.jpg" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Suki Burks </a></h6>
										<span> sukiburks@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
								<div class="user-item">
									<div class="avatar avatar-md mr-3">
										<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Yuri Berry </a></h6>
										<span> Yyuriberry@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
								<div class="user-item mb-2">
									<div class="avatar avatar-md mr-3 mb-1">
										<img class="img-fluid" src="src\assets\images\team\05.jpg" alt="">
									</div>
									<div class="user-name">
										<h6><a href="#!">Airi Satou </a> </h6>
										<span> airisatou@gmail.com</span>
									</div>
									<div class="user-action">
										<div class="dropdown icon-dropdown">
											<a class="btn-icon dropdown-toggle" data-toggle="dropdown" href="#">
												<i class="zmdi zmdi-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-inbox"></i>Inbox</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-refresh-sync-alert"></i>Refresh</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-gps"></i>Manage Widgets</a>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-portable-wifi"></i>Edit Widgets</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="zmdi zmdi-settings"></i>Settings</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Latest activity</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="activity">
								<div class="activity-item">
									<div class="date">Sep 25</div>
									<div class="text">Responded to need <a href="#!">“Volunteer opportunity”</a></div>
								</div>
								<div class="activity-item">
									<div class="date">Sep 24</div>
									<div class="text">Added an interest <a href="#!">“Volunteer Activities”</a></div>
								</div>
								<div class="activity-item">
									<div class="date">Sep 23</div>
									<div class="text">Joined the group <a href="#!">“Boardsmanship Forum”</a></div>
								</div>
								<div class="activity-item">
									<div class="date">Sep 21</div>
									<div class="text">Responded to need <a href="#!">“In-Kind Opportunity”</a></div>
								</div>
								<div class="activity-item">
									<div class="date">Sep 18</div>
									<div class="text">Created need <a href="#!">“Volunteer Opportunity”</a></div>
								</div>
								<div class="activity-item pb-2">
									<div class="date">Sep 17</div>
									<div class="text">Attending the event <a href="#!">“Some New Event”</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">Manage employ position</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-centered table-hover mb-0">
									<thead>
										<tr>
											<th scope="col">Employ </th>
											<th scope="col">Position</th>
											<th scope="col">Office</th>
											<th scope="col">Age</th>
											<th scope="col">Start date</th>
											<th scope="col">Aparicinacy</th>
											<th scope="col">Salary</th>
											<th scope="col">Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th scope="row"><img class="rounded-circle mr-2" src="src\assets\images\team\01.jpg" width="40" height="40"  alt=""> </th>
											<td>Accountant</td>
											<td>802 Peninsula St. Madison, AL 35758</td>
											<td>33</td>
											<td>2008/11/28</td>
											<td>
												<div class="progress progress-h-5">
													<div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</td>
											<td> $162,700 </td>
											<td><a class="btn btn-overlay-primary btn-icon btn-sm" href="#"><i class="la la-edit"></i> </a></td>
										</tr>
										<tr>
											<th scope="row"><img class="rounded-circle mr-2" src="src\assets\images\team\02.jpg" width="40" height="40"  alt=""></th>
											<td>Sales </td>
											<td>412 S. Green Hill St. Asheboro, NC 27205</td>
											<td>50</td>
											<td>2001/08/12</td>
											<td>
												<div class="progress progress-h-5">
													<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</td>
											<td> $5,56,700 </td>
											<td><a class="btn btn-overlay-primary btn-icon btn-sm" href="#"><i class="fa fa-trash-o"></i> </a></td>
										</tr>
										<tr>
											<th scope="row"><img class="rounded-circle mr-2" src="src\assets\images\team\03.jpg" width="40" height="40"  alt=""></th>
											<td>Developer</td>
											<td>46 St Paul Ave. Dickson, TN 37055</td>
											<td>30</td>
											<td>2010/12/30</td>
											<td>
												<div class="progress progress-h-5">
													<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</td>
											<td> $56,700 </td>
											<td><a class="btn btn-overlay-primary btn-icon btn-sm" href="#"><i class="la la-edit"></i> </a></td>
										</tr>
										<tr>
											<th scope="row"><img class="rounded-circle mr-2" src="src\assets\images\team\04.jpg" width="40" height="40"  alt=""></th>
											<td>Designer</td>
											<td>197 Hawthorne Rd. Beckley, WV 25801</td>
											<td>28</td>
											<td>2012/06/02</td>
											<td>
												<div class="progress progress-h-5">
													<div class="progress-bar" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</td>
											<td> $13,465 </td>
											<td><a class="btn btn-overlay-primary btn-icon btn-sm" href="#"><i class="fa fa-trash-o"></i> </a></td>
										</tr>
										<tr>
											<th scope="row"><img class="rounded-circle mr-2" src="src\assets\images\team\05.jpg" width="40" height="40"  alt=""></th>
											<td>Sales </td>
											<td>412 S. Green Hill St. Asheboro, NC 27205</td>
											<td>50</td>
											<td>2001/08/12</td>
											<td>
												<div class="progress progress-h-5">
													<div class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</td>
											<td> $5,56,700 </td>
											<td><a class="btn btn-overlay-primary btn-icon btn-sm" href="#"><i class="fa fa-trash-o"></i> </a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<footer class="footer pb-3">
			<div class="row text-center text-md-left">
		    <div class="col-md-6">
		    	<p>Copyright © <script>document.write(new Date().getFullYear())</script> <a target="_blank" href="https://www.infinitysoftway.com/">infinitysoftway </a> All Rights Reserved</p>
		    </div>
		    <div class="col-md-6 text-md-right">
		      <div class="footer-links">
		        <ul class="list-unstyled list-inline mb-0">
		          <li class="list-inline-item"><a class="text-dark" href="#">Privacy Policy </a></li>
		          <li class="list-inline-item"><a class="text-dark" href="#">Terms of Use  </a></li>
		          <li class="list-inline-item"><a class="text-dark" href="#">Contact us </a></li>
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

<!-- apexcharts -->
<script src="src/js/apexcharts/apexcharts.min.js"></script>
<script src="src\js\apexcharts\apexcharts-custom.js"></script>

<!-- custom -->
<script src="src\js\custom.js"></script>

</body>

<!-- Mirrored from infinitysoftway.com/oxoury/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 13:59:55 GMT -->
</html>