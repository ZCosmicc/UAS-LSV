<?php
session_start();
require ("model.php");

  if (!isset($_SESSION["login"])) {
    header("Location: loginPage.php");
    exit;
  }

  $projectID = !empty($_GET['project_id']) ? $_GET['project_id'] : '';
  $taskID = !empty($_GET['task_id']) ? $_GET['task_id'] : '';
  $userID = $_SESSION["user_id"];
  $userData = getUserData("users", $userID);
  $uDatas = getData("users");
  $pjlists = getData("projects");
  $tasklists = getData("tasks");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the form was submitted
  $taskData = array(
    "task_id" => $_POST["task_id"],
    "task_name" => $_POST["task_name"],
    "task_description" => $_POST["task_description"],
    "due_date" => $_POST["due_date"],
    "responsible_user" => $_POST["responsible_user"],
    "project_id" => $_POST["project_id"],
    "status" => $_POST["status"]
  );

// Call the addTask function
if (isset($_POST["submit"])){
  if(addTask($_POST) > 0) {
    echo "
		<script>
		  alert('Task successfully added!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
		</script>
	  ";
	} else {
	  echo "
		<script>
		  alert('Task failed to added!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
		</script>
	  ";
	}
  }
}

// Call the updateTask function
if (isset($_POST["edit"])) {
  if(updateTask($_POST) > 0) {
    echo "
    <script>
      alert('Task successfully updated!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Task failed to update!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
    </script>
    ";
  }
}

// Call the deleteTask function
if (isset($_GET["task_id"])) {
  $taskID = $_GET["task_id"];
  $projectID = !empty($_GET['project_id']) ? $_GET['project_id'] : '';
  if (deleteTask($taskID) > 0) {
    echo "<script>  
      alert('Task successfully deleted!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
      </script>";
  } else {
    echo "<script>  
      alert('Task failed to delete!');
      window.location.href = 'toDoTaskPage.php?project_id=$projectID';
      </script>";
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
<title>SIMP - Tasks Page</title>

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
<?php if (!empty($projectID)) : ?>
  <?php $project = getData("projects WHERE project_id = $projectID")[0]; ?>
<div class="main-panel">
  <div class="panel-hedding">
    <div class="row mb-4">
      <div class="col-md-6">
        <h1><?php echo $project["project_name"]; ?></h1>
        <p>Selected Project</p>
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
				<div class="col-lg-12">
					<div class="card">
						<div class="card-title">
							<div class="card-title-left">
								<h4 class="card-title-text">To do task</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="todo-task">
								<ul class="list-group">
                  <?php foreach ($tasklists as $tasklist) : ?>
                    <?php if($tasklist["project_id"] == $projectID) : ?>
									<li class="list-group-item">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="<?php echo $tasklist["task_id"];?>">
											<label class="custom-control-label" for="<?php echo $tasklist["task_id"];?>"><?php echo $tasklist["task_name"];?></label>
											<p class="task-status"><?php echo $tasklist["task_description"];?></p>
										</div>
										<div class="task-action">
                      <?php if ($_SESSION["role"] === "admin"): ?>
											<ul class="list-unstyled">
                        <li><a href="#editTaskModal" data-toggle="modal" data-task-id="<?php echo $tasklist["task_id"]; ?>" class="edit-task-button"><i class="la la-edit"></i></a></li>
												<li><a href="?task_id=<?php echo $tasklist["task_id"];?>&project_id=<?php echo $projectID; ?>"><i class="la la-trash-o"></i></a></li>
											</ul>
                      <?php elseif ($_SESSION["role"] === "member"): ?>
                      <div class="hidden-item">
                      </div>
                      <?php endif; ?>
										</div>
									</li>
                  <?php endif; ?>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
			</div>
	</div>
</div>
<?php endif; ?>
  <div class="modal fade" id="exampleModal-03" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body p-5">
        <form method="post">
        <div class="form-group">
            <label for="project_id" hidden>Created by</label>
            <input type="text" class="form-control" name="project_id" value="<?= $_GET["project_id"] ?>" placeholder="Enter Project Name" hidden>
        </div>
        <div class="form-group">
          <label for="task_name">Task Title</label>
          <input type="text" class="form-control" name="task_name" placeholder="Enter Task Title" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="task_description" placeholder="Enter Short Description" required></textarea>
        </div>
        <div class="form-group">
          <label for="due_date">Due Date</label>
          <input type="date" class="form-control" name="due_date" required>
        </div>
        <div class="form-group">
          <label for="responsible_user">Responsible User</label>
          <select class="form-control" name="responsible_user" required>
            // add user responsible from my user database
            <?php foreach ($uDatas as $user) : ?>
              //get user from table users
              <option value="<?= $user["user_id"] ?>"><?= $user["full_name"] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" required>
            <option value="In Progress">In Progress</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
          </select>
        </div>
          <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
        </form>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body p-5">
        <form method="post">
        <div class="form-group">
            <label for="project_id" hidden>Created by</label>
            <input type="text" class="form-control" name="task_id" value="<?= $tasklist["task_id"] ?>" placeholder="Enter Project Name" hidden>
        </div>
        <div class="form-group">
          <label for="task_name">Task Title</label>
          <input type="text" class="form-control" name="task_name" placeholder="Enter Task Title" value="<?php echo $tasklist["task_name"]?>" required>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="task_description" placeholder="Enter Short Description" required><?php echo $tasklist["task_description"]?></textarea>
        </div>
        <div class="form-group">
          <label for="due_date">Due Date</label>
          <input type="date" class="form-control" name="due_date" value="<?php echo $tasklist["due_date"]?>" required>
        </div>
        <div class="form-group">
          <label for="responsible_user">Responsible User</label>
          <select class="form-control" name="responsible_user" required>
          <option selected="" disabled>Select new responsible user</option>
            <?php foreach ($uDatas as $user) : ?>
              <option value="<?= $user["user_id"] ?>"><?= $user["full_name"] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" required>
            <option selected="" disabled>Select new status</option>
            <option value="In Progress">In Progress</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
          </select>
        </div>
          <button type="submit" name="edit" class="btn btn-primary">Update Task</button>
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