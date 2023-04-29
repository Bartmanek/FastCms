<?php
include('./db.php');
$username = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];

if (!empty($username) && !empty($email) && !empty($pass) && !empty($pass2)) {

    $sql = "SELECT username, email, password FROM user WHERE email=\"$email\" OR username=\"$username\";";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_row($query);

    if ($rows[0] == $username && $rows[1] == $email) {
        header("Location: ../subpages/signup.php?error=Email and username already in use");
    } else if ($rows[1] == $email) {
        header("Location: ../subpages/signup.php?error=Email already in use&name=$username");
    } else if ($rows[0] == $username) {
        header("Location: ../subpages/signup.php?error=Username already in use&email=$email");
    } else {
        if ($pass == $pass2) {
            $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
            $date = date("Y-m-d");
            $add = "INSERT INTO user (username, email, password, admin, join_date) VALUES (\"$username\", \"$email\", \"$pass_hashed\", 0, \"$date\");";
            $query = mysqli_query($conn, $add);
            $url = "../user/$username";
            mkdir($url, 0700);
            header("Location: ../subpages/login.php?email=$username&error=Done");
        } else {
            header("Location: ../subpages/signup.php?error=Passwords don't match&name=$username&email=$email");
        }
    }
} else {
    header("Location: ../subpages/signup.php?error=Fill all data");
}

?>