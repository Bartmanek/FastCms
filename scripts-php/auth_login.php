<?php include('./db.php');
$email = $_POST['email'];
$pass = $_POST['password'];

if (!empty($email) && !empty($pass)) {
    $sql = "SELECT username, email, password, admin FROM user WHERE email=\"$email\" OR username=\"$email\";";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);

    if (password_verify($pass, $rows[2])) {
        $token = bin2hex(random_bytes(32));
        setcookie("auth_token", $token, time() + 10800, "/");

        session_start();
        $_SESSION['auth_token'] = $token;
        $sql2 = "UPDATE user SET auth_token=\"$token\" WHERE email=\"$email\" OR username=\"$email\";";
        mysqli_query($conn, $sql2);
        if ($rows[3] == 1) {
            header("Location: ../subpages/admin/dashboard.php");
        } else {
            header("Location: ../subpages/user/dashboard.php");
        }
    } else {
        header("Location: ../subpages/login.php?error=Incorrect email or password&email=$email");
    }
} else {
    header("Location: ../subpages/login.php?error=Fill all data");
}

?>