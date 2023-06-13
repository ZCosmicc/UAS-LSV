<?php
require('koneksi.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;



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

// Get member data
function getMemberData($table)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM $table WHERE role = 'member'");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Delete the user in the database
function deleteUser($userID) {
    global $koneksi;

    $query = "DELETE FROM users WHERE user_id = $userID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// Get new registered user data
// Retrieve the data of new registered users
function getNewRegisteredUsers() {
    global $koneksi;

    $query = "SELECT user_photo, email, date_created FROM users WHERE role = 'member' ORDER BY date_created DESC LIMIT 5";
    $result = mysqli_query($koneksi, $query);

    // Check if the query was successful
    if ($result) {
        $users = array();

        // Fetch the data as an associative array
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }

        // Free the result set
        mysqli_free_result($result);

        return $users;
    } else {
        // Query failed, return false or handle the error accordingly
        return false;
    }
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

function checkToken($token)
{
    global $koneksi;

    $result = mysqli_query($koneksi, "SELECT * FROM forgot_password WHERE token = '$token'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) === 1) {
        $expiration = $row["expiration"];
        if (date('Y-m-d H:i:s') > $expiration) {
            return false;
        }
        return true;
    } else {
        return false;
    }
}

function forgotPassword($data) {
    global $koneksi;

    $email = $data["email"];
    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        date_default_timezone_set('Asia/Singapore');

        $row = mysqli_fetch_assoc($result);
        $userID = $row["user_id"];
        $token = uniqid();
        $expired_at = date("Y-m-d H:i:s", time() + 60 * 60);
        $query = "INSERT INTO forgot_password VALUES('', '$userID', '$token', '$expired_at')";

        mysqli_query($koneksi, $query);

        $mailer = new PHPMailer(true);

        try {
            // SMTP configuration
            $smtpHost = 'smtp.gmail.com';
            $smtpPort = 587;
            $smtpUsername = 'farizfadillah612@gmail.com';
            $smtpPassword = 'xdawgicscjmsuhvg';

            $mailer->isSMTP();
            $mailer->Host = $smtpHost;
            $mailer->Port = $smtpPort;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = 'tls';
            $mailer->Username = $smtpUsername;
            $mailer->Password = $smtpPassword;

            // Set up email content
            $mailer->setFrom($smtpUsername, 'SIMP-System');
            $mailer->addAddress($email);
            $mailer->Subject = 'Set Up Your New Password';
            $mailer->Body = "Click this link to reset and set up your new password: http://localhost/UAS%20LSV/reset-password.php?token=$token";

            // Send email
            $mailer->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
            return false;
        }
    }
}

function resetPassword($newPassword, $confirmPassword) {

    global $koneksi;

    $token = $_GET["token"];
    if ($newPassword != $confirmPassword) {
        return false;
    }

    $result = mysqli_query($koneksi, "SELECT * FROM forgot_password WHERE token = '$token'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) === 1) {
        $userID = $row["user_id"];
        $resultUser = mysqli_query($koneksi, "SELECT * FROM users WHERE user_id = '$userID'");
        $rowUser = mysqli_fetch_assoc($resultUser);

        $email = $rowUser["email"];
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE users SET password = '$newPasswordHash' WHERE user_id = '$userID'";
        mysqli_query($koneksi, $query);
        $query2 = "DELETE FROM forgot_password WHERE token='$token'";
        mysqli_query($koneksi, $query2);

        $mailer = new PHPMailer(true);

        try {
            // SMTP configuration
            $smtpHost = 'smtp.gmail.com';
            $smtpPort = 587;
            $smtpUsername = 'farizfadillah612@gmail.com';
            $smtpPassword = 'xdawgicscjmsuhvg';

            $mailer->isSMTP();
            $mailer->Host = $smtpHost;
            $mailer->Port = $smtpPort;
            $mailer->SMTPAuth = true;
            $mailer->SMTPSecure = 'tls';
            $mailer->Username = $smtpUsername;
            $mailer->Password = $smtpPassword;

            // Set up email content
            $mailer->setFrom($smtpUsername, 'SIMP-System');
            $mailer->addAddress($email);
            $mailer->Subject = 'Your Password Has Been Changed';
            $mailer->Body = "Your password has been changed. If you didn't change your password, please contact the administrator.";

            // Send email
            $mailer->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mailer->ErrorInfo}";
            return false;
        }
    } else {
        return false;
    }
}

function addProject($pjlist) {
    global $koneksi;
    
    // Escape the values to prevent SQL injection
    $created_by = $_SESSION["user_id"];
    $projectName = mysqli_real_escape_string($koneksi, $pjlist['project_name']);
    $description = mysqli_real_escape_string($koneksi, $pjlist['project_description']);
    $createdDate = mysqli_real_escape_string($koneksi, $pjlist['created_date']);
    $deadlineDate = mysqli_real_escape_string($koneksi, $pjlist['deadline_date']);
    $status = mysqli_real_escape_string($koneksi, $pjlist['status']);
    
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

function updateProject($projectData) {
    global $koneksi;

    $projectID = mysqli_real_escape_string($koneksi, $projectData['project_id']);
    $projectName = mysqli_real_escape_string($koneksi, $projectData['project_name']);
    $description = mysqli_real_escape_string($koneksi, $projectData['project_description']);
    $deadlineDate = mysqli_real_escape_string($koneksi, $projectData['deadline_date']);
    $status = mysqli_real_escape_string($koneksi, $projectData['status']);

    $query = "UPDATE projects SET 
                project_name = '$projectName',
                project_description = '$description',
                deadline_date = '$deadlineDate',
                status = '$status'
                WHERE project_id = $projectID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function searchProject($searchQuery) {
    global $koneksi;

    $query = "SELECT * FROM projects WHERE project_name LIKE '%$searchQuery%' OR project_description LIKE '%$searchQuery%'";
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function deleteProject($projectID) {
    global $koneksi;

    $query = "DELETE FROM projects WHERE project_id = $projectID";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
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