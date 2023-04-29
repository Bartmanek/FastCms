<?php
include('db.php');
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_SESSION['auth_token']) && isset($_COOKIE["auth_token"])) {
    $token = $_SESSION['auth_token'];
    $cookie_token = $_COOKIE["auth_token"];
} else {
    $token = 02;
    $cookie_token = 'e';
}

if ($token == $cookie_token) {
    $sql = "SELECT id, admin FROM user WHERE auth_token=\"$token\";";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);
    $id = $rows[0];
    if ($rows[1] == 0) {
        if (strpos($_SERVER['REQUEST_URI'], "admin") !== false) {
            unset($_COOKIE['auth_token']);
            setcookie("auth_token", " ", time() - 10800, "/");
            session_unset();
            session_destroy();
            header("Location: ../login.php?error=ses");
        }
    }
} else {
    unset($_COOKIE['auth_token']);
    setcookie("auth_token", " ", time() - 10800, "/");
    session_unset();
    session_destroy();
    header("Location: ../login.php?error=ses");
}
?>