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
    setcookie("id_user", "", time() - 60);
    setcookie("key", "", time() - 60);

    header("Location: index.php");
    exit;
}

//Register
function register($data)
{
    global $koneksi;

    $full_name = htmlspecialchars($data["full_name"]);
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);

    // Encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Add new user
    $query = "INSERT INTO users VALUES('', '$full_name', '$email', '$password', '','', 'member')";
    $result = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>