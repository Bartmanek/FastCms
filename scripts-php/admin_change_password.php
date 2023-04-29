<?php
include('./db.php');
include('./auth.php');

$oldpass = $_POST['old_pass'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
settype($id, 'int');

if (!empty($oldpass) && !empty($pass) && !empty($pass2)) {
    $sql = "SELECT password FROM user WHERE id=\"$id\";";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    if ($oldpass != $pass) {
        if (password_verify($oldpass, $rows[0])) {
            if ($pass == $pass2) {
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "UPDATE user SET password=\"$pass_hash\";";
                mysqli_query($conn, $sql);
                header("Location: ../subpages/admin/settings.php?error=Done");
            } else {
                header("Location: ../subpages/admin/settings.php?error=Passwords don't match");
            }
        } else {
            header("Location: ../subpages/admin/settings.php?error=Incorrect password");
        }
    } else {
        header("Location: ../subpages/admin/settings.php?error=You entered same password");
    }
} else {
    header("Location: ../subpages/admin/settings.php?error=Fill all data");
}

?>