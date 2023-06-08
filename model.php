<?php
require('koneksi.php');

//Get all data
function getData($table)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM $table");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//Register
function register($data)
{
    global $koneksi;

    // Set the timezone to Indonesian local time
    date_default_timezone_set('Asia/Jakarta');

    $full_name = htmlspecialchars($data["full_name"]);
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $date_created = date("Y-m-d H:i:s");

    // Check if the email already exists
    if (emailExists($email)) {
        return 0; // Return 0 to indicate registration unsuccessful
    }

    // Encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Add new user
    $query = "INSERT INTO users VALUES('', '$full_name', '$email', '$password', '','$date_created', 'member', '', '', '', '', '')";
    $result = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// Function to check if email exists
function emailExists($email) {
    global $koneksi;

    // Sanitize the email
    $email = mysqli_real_escape_string($koneksi, $email);

    // Query to check if email exists
    $query = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['count'] > 0;
}

//Login
function login($data)
{
    global $koneksi;

    $email = $data["email"];
    $password = $data["password"];

    // Check whether email ir or is not in the database
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        //Password check
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //Session set
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["full_name"] = $row["full_name"];
            $_SESSION["position"] = $row["position"];
            $_SESSION["phone_number"] = $row["phone_number"];
            $_SESSION["address"] = $row["address"];
            $_SESSION["about"] = $row["about"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["password"] = $row["password"];
            $_SESSION["user_photo"] = $row["user_photo"];
            $_SESSION["role"] = $row["role"];
        
            return true;
        }
    }
    return false;
}

//Logout
function logout()
{
    // Session Delete
    $_SESSION = [];
    session_destroy();

    // Cookie Delete
    setcookie("user_id", "", time() - 60);
    setcookie("key", "", time() - 60);

    header("Location: index.php");
    exit;
}

// Get user role by email
function getUserRole($email) {
    global $koneksi;

    // Prepare the statement
    $stmt = mysqli_prepare($koneksi, "SELECT role FROM users WHERE email = ?");
    
    // Bind the email parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Bind the result
    mysqli_stmt_bind_result($stmt, $role);

    // Fetch the result
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $role;
}

// Get user data by ID
function getUserData($table, $userID)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM $table WHERE user_id = $userID");
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// Update the user profile in the database based on the submitted data
function updateUserProfile() {
    global $koneksi;

    $userID = $_SESSION["user_id"];
    $full_name = htmlspecialchars($_POST["full_name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone_number = htmlspecialchars($_POST["phone_number"]);
    $address = htmlspecialchars($_POST["address"]);
    $about = htmlspecialchars($_POST["about"]);
    $user_photo = isset($_FILES["user_photo"]["name"]) ? $_FILES["user_photo"]["name"] : "";
    $position = htmlspecialchars($_POST["position"]);
    $gender = htmlspecialchars($_POST["gender"]);

    if (!empty($user_photo)) {
        $target_dir = "src/assets/images/team/"; // Directory where you want to store the uploaded photos
        $target_file = $target_dir . basename($_FILES["user_photo"]["name"]);
        move_uploaded_file($_FILES["user_photo"]["tmp_name"], $target_file);
    }

    $query = "UPDATE users SET 
                full_name = '$full_name',
                email = '$email',
                phone_number = '$phone_number',
                address = '$address',
                about = '$about',
                user_photo = '$user_photo',
                position = '$position',
                gender = '$gender'
                WHERE user_id = $userID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function addProject($projectData) {
    global $koneksi;
    
    // Escape the values to prevent SQL injection
    $created_by = $_SESSION["user_id"];
    $projectName = mysqli_real_escape_string($koneksi, $projectData['project_name']);
    $description = mysqli_real_escape_string($koneksi, $projectData['project_description']);
    $createdDate = mysqli_real_escape_string($koneksi, $projectData['created_date']);
    $deadlineDate = mysqli_real_escape_string($koneksi, $projectData['deadline_date']);
    $status = mysqli_real_escape_string($koneksi, $projectData['status']);
    
    // Prepare the SQL query
    $sql = "INSERT INTO projects (project_name, project_description, created_date, deadline_date, created_by,  status) 
            VALUES ('$projectName', '$description', '$createdDate', '$deadlineDate', $created_by,  '$status')";
    
    // Execute the query
    if (mysqli_query($koneksi, $sql)) {
      // Project added successfully
      return mysqli_insert_id($koneksi); // Return the ID of the newly inserted project
    } else {
      // Failed to add project
      echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
      return 0; // Return 0 to indicate failure
    }
    
    // Close the database connection
    mysqli_close($koneksi);
}

function addTask($taskData) {
    global $koneksi;
    
    // Escape the values to prevent SQL injection
    $taskName = mysqli_real_escape_string($koneksi, $taskData['task_name']);
    $taskDescription = mysqli_real_escape_string($koneksi, $taskData['task_description']);
    $dueDate = mysqli_real_escape_string($koneksi, $taskData['due_date']);
    $responsibleUser = mysqli_real_escape_string($koneksi, $taskData['responsible_user']);
    $projectID = mysqli_real_escape_string($koneksi, $taskData['project_id']);
    $status = mysqli_real_escape_string($koneksi, $taskData['status']);
    
    // Prepare the SQL query
    $sql = "INSERT INTO tasks (task_name, task_description, due_date, responsible_user,  status, project_id) 
            VALUES ('$taskName', '$taskDescription', '$dueDate', $responsibleUser,  '$status', '$projectID')";
    
    // Execute the query
    if (mysqli_query($koneksi, $sql)) {
      // Task added successfully
      return mysqli_insert_id($koneksi); // Return the ID of the newly inserted task
    } else {
      // Failed to add task
      echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
      return 0; // Return 0 to indicate failure
    }
    
    // Close the database connection
    mysqli_close($koneksi);
}

// Update the task in the database based on the submitted data
function updateTask($taskData) {
    global $koneksi;

    $taskID = mysqli_real_escape_string($koneksi, $taskData['task_id']);
    $taskName = mysqli_real_escape_string($koneksi, $taskData['task_name']);
    $taskDescription = mysqli_real_escape_string($koneksi, $taskData['task_description']);
    $dueDate = mysqli_real_escape_string($koneksi, $taskData['due_date']);
    $responsibleUser = mysqli_real_escape_string($koneksi, $taskData['responsible_user']);
    $status = mysqli_real_escape_string($koneksi, $taskData['status']);

    $query = "UPDATE tasks SET 
                task_name = '$taskName',
                task_description = '$taskDescription',
                due_date = '$dueDate',
                responsible_user = '$responsibleUser',
                status = '$status'
                WHERE task_id = $taskID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Delete the task in the database
function deleteTask($taskID) {
    global $koneksi;

    $query = "DELETE FROM tasks WHERE task_id = $taskID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

?>