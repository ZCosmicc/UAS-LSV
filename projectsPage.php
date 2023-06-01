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

<!-- Mirrored from infinitysoftway.com/oxoury/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:32 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="Infinitysoftway" />
<meta name="description" content="statistic charts">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
 
<!-- TITLE -->
<title>SIMP - Projects</title>

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
        <div class="search-box">
          <div class="search">
            <input class="form-control border-0" type="search" placeholder="Type something..." aria-label="Search">
            <a href="#">  <i class="la la-search"></i> </a>
          </div>
        </div>
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
                  </div>              </a>
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
                  <a class="dropdown-item" href="profile.html"> <i class="la la-edit"></i>  My Profile </a>
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
</div>


<!-- **********  main-panel  ********** -->
<div class="main-panel">
  <div class="panel-hedding">
    <div class="row mb-4">
      <div class="col-md-6">
        <h1>Your Projects</h1>
        <p>Let's get to work</p>
      </div>
      <div class="col-md-6">
        <div class="add-new">
          <a class="btn btn-primary" href="#!"> <i class="feather icon-plus"></i> Add new</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> Application development </a></h5>
                <span>Budget: $60,457</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-danger ml-2 float-right">Pending</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Officia nam sed possimus repellat et, assumenda corporis velit? Dicta et tenetur consequatur.</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary">
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>10/01/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>10/01/2021</p>
                </div>
              </div>
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
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cedric Kelly"> <img class="img-fluid" src="src\assets\images\team\03.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gavin Joyce">  <img class="img-fluid" src="src\assets\images\team\04.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="View all"><span class="avatar-name">15+</span> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> Application Testing </a></h5>
                <span>Budget: $12,467</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-success ml-2 float-right">Active</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Assumenda corporis velit? Dicta et tenetur consequatur officia nam sed possimus repellat et.</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary" checked>
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>12/06/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>10/06/2021</p>
                </div>
              </div>
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
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="View all"><span class="avatar-name">02+</span> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> UI design </a></h5>
                <span>Budget: $2,456</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-success ml-2 float-right">Active</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Tepellat et, assumenda corporis velit? Dicta et tenetur consequatur officia nam sed possimus.</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary" checked>
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>12/03/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>30/03/2021</p>
                </div>
              </div>
            </div>
            <div class="project-status mt-3">
              <div class="project-status-label ">
                <span>Completed</span>
                <span>45%</span>
              </div>
              <div class="progress progress-h-5">
                <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cedric Kelly"> <img class="img-fluid" src="src\assets\images\team\03.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> App design </a></h5>
                <span>Budget: $1,452</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-danger ml-2 float-right">Pending</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Dicta et tenetur consequatur. officia nam sed possimus repellat et, assumenda corporis velit?</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary">
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>01/05/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>14/05/2021</p>
                </div>
              </div>
            </div>
            <div class="project-status mt-3">
              <div class="project-status-label ">
                <span>Completed</span>
                <span>77%</span>
              </div>
              <div class="progress progress-h-5">
                <div class="progress-bar" role="progressbar" style="width: 77%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gavin Joyce">  <img class="img-fluid" src="src\assets\images\team\04.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="View all"><span class="avatar-name">06+</span> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> Application development </a></h5>
                <span>Budget: $20,566</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-success ml-2 float-right">Active</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Officia nam sed possimus repellat et, assumenda corporis velit? Dicta et tenetur consequatur.</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary" checked>
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>10/16/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>10/16/2021</p>
                </div>
              </div>
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
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cedric Kelly"> <img class="img-fluid" src="src\assets\images\team\03.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gavin Joyce">  <img class="img-fluid" src="src\assets\images\team\04.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="View all"><span class="avatar-name">01+</span> </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6">
      <div class="card">
        <div class="card-body">
          <div class="project-item">
            <div class="project-title mb-3">
              <div class="project-title-left">
                <h5> <a href="#!"> Landing page design </a></h5>
                <span>Budget: $12,496</span>
              </div>
              <div class="project-badge">
                <span class="badge badge-overlay-danger ml-2 float-right">Pending</span>
              </div>
            </div>
            <div class="project-comments mt-4">
              <h6 class="mb-2">Comments : </h6>
              <p>Velit officia nam sed possimus repellat et, assumenda corporis? Dicta et tenetur consequatur.</p>
            </div>
            <div class="row mt-4">
              <div class="col">
                <div class="project-tracker">
                  <h6 class="mb-2">Tracker: </h6>
                  <div class="switcher">
                    <label class="switch ">
                      <input type="checkbox" class="primary">
                      <span class="slider round name"></span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">Start date: </h6>
                  <p>05/10/2021</p>
                </div>
              </div>
              <div class="col">
                <div class="project-deadline">
                  <h6 class="mb-2">End date: </h6>
                  <p>16/10/2021</p>
                </div>
              </div>
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
            <div class="project-team mt-4">
              <h6 class="mb-2">Team: </h6>
              <div class="avatar-group">
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Airi Satou">  <img class="img-fluid" src="src\assets\images\team\01.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bruno Nash"> <img class="img-fluid" src="src\assets\images\team\02.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cedric Kelly"> <img class="img-fluid" src="src\assets\images\team\03.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gavin Joyce">  <img class="img-fluid" src="src\assets\images\team\04.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gavin Joyce">  <img class="img-fluid" src="src\assets\images\team\05.jpg" alt=""></a>
                </div>
                <div class="avatar avatar-sm">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="View all"><span class="avatar-name">10+</span> </a>
                  </div>
                </div>
              </div>
            </div>
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

<!-- Mirrored from infinitysoftway.com/oxoury/projects.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 May 2023 14:00:32 GMT -->
</html>