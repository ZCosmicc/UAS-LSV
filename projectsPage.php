<?php
session_start();
require ("model.php");

  if (!isset($_SESSION["login"])) {
    header("Location: loginPage.php");
    exit;
  }

  $userID = $_SESSION["user_id"];
  $userData = getUserData("users", $userID);
  $pjlists = getData("projects");

  if (isset($_GET["search"])) {
    $searchResults = searchProject($_GET["search"]);
  } else {
    $searchResults = $pjlists;
  }

  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the form was submitted
  $projectData = array(
    "project_name" => $_POST["project_name"],
    "project_description" => $_POST["project_description"],
    "created_date" => $_POST["created_date"],
    "deadline_date" => $_POST["deadline_date"],
    "created_by" => $_POST["created_by"],
    "status" => $_POST["status"]
  );

  // Call the addProject function

if (isset($_POST["submit"])){
  if(addProject($_POST) > 0) {
    echo "
		<script>
		  alert('Project successfully added!');
      window.location.href = 'projectsPage.php';
		</script>
	  ";
	} else {
	  echo "
		<script>
		  alert('Project failed to added!');
      window.location.href = 'projectsPage.php';
		</script>
	  ";
	}
  }
}

// Call the updateProject function
if (isset($_POST["edit"])) {
  if(updateProject($_POST) > 0) {
    echo "
    <script>
      alert('Project successfully updated!');
      window.location.href = 'projectsPage.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Project failed to updated!');
      window.location.href = 'projectsPage.php';
    </script>
    ";
  }
}

// Call the deleteProject function
if (isset($_GET["project_id"])) {
  $projectID = $_GET["project_id"];
  if (deleteProject($projectID) > 0) {
    echo "
    <script>
      alert('Project successfully deleted!');
      window.location.href = 'projectsPage.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Project failed to delete!');
      window.location.href = 'projectsPage.php';
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
        <form action="projectsPage.php" method="GET">
        <div class="search-box">
          <div class="search">
            <input class="form-control border-0" type="text" name="search" placeholder="Search project..." aria-label="Search">
            <a type="submit"><i class="la la-search"></i></a>
          </div>
        </div>
        </form>
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
                  </div>              </a>
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
        <?php if ($_SESSION["role"] === "admin"): ?>
          <div class="add-new">
            <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-03" fdprocessedid="lmb1tq"> <i class="feather icon-plus"></i> Add new</a>
          </div>
        <?php elseif ($_SESSION["role"] === "member"): ?>
          <div class="hidden-item">
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <?php foreach ($searchResults as $pjlist) : ?>
        <div class="col-lg-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="project-item">
                        <div class="project-title mb-3">
                            <div class="project-title-left">
                                <h5><a href="toDoTaskPage.php?project_id=<?php echo $pjlist["project_id"]?>"><?php echo $pjlist["project_name"]; ?></a></h5>
                            </div>
                            <div class="project-badge">
                                <?php if ($pjlist["status"] == "In Progress") : ?>
                                    <span class="badge badge-overlay-primary ml-2 float-right"><?php echo $pjlist["status"]; ?></span>
                                <?php elseif ($pjlist["status"] == "Pending") : ?>
                                    <span class="badge badge-pill badge-warning ml-2 float-right"><?php echo $pjlist["status"]; ?></span>
                                <?php elseif ($pjlist["status"] == "Completed") : ?>
                                    <span class="badge badge-overlay-success ml-2 float-right"><?php echo $pjlist["status"]; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="project-comments mt-4">
                            <h6 class="mb-2">Description : </h6>
                            <p><?php echo $pjlist["project_description"]; ?></p>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <div class="project-deadline">
                                    <h6 class="mb-2">Start date: </h6>
                                    <p><?php echo $pjlist["created_date"]; ?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="project-deadline">
                                    <h6 class="mb-2">End date: </h6>
                                    <p><?php echo $pjlist["deadline_date"]; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="task-action">
                          <?php if ($_SESSION["role"] === "admin"): ?>
											      <ul class="list-unstyled">
												      <li><a href="?project_id=<?php echo $pjlist["project_id"];?>"><i class="la la-trash-o"></i></a></li>
											      </ul>
                          <?php elseif ($_SESSION["role"] === "member"): ?>
                            <div class="hidden-item">
                            </div>
                          <?php endif; ?>
										    </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
  <div class="modal fade" id="exampleModal-03" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body p-5">
        <form method="post">
        <div class="form-group">
            <label for="project_name" hidden>Created by</label>
            <input type="text" class="form-control" name="created_by" value="<?= $_SESSION["user_id"] ?>" placeholder="Enter Project Name" hidden>
        </div>
        <div class="form-group">
          <label for="project_name">Project Name</label>
          <input type="text" class="form-control" name="project_name" placeholder="Enter Project Name" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="project_description" placeholder="Enter Project Description" required></textarea>
        </div>
        <div class="form-group">
          <label for="start_date">Start Date</label>
          <input type="date" class="form-control" name="created_date" required>
        </div>
        <div class="form-group">
          <label for="end_date">End Date</label>
          <input type="date" class="form-control" name="deadline_date" required>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" required>
            <option value="In Progress">In Progress</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
          </select>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Add Project</button>
        </form>
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