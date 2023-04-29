<?php
include('./db.php');
include('./auth.php');
settype($id, 'int');

$sql = "DELETE FROM user WHERE id=\"$id\"";
$sql2 = "DELETE FROM projects WHERE userID=\"$id\"";
mysqli_query($conn, $sql);
mysqli_query($conn, $sq2);
unset($_COOKIE['auth_token']);
setcookie("auth_token", " ", time() - 10800, "/");
session_unset();
session_destroy();
header("Location: ../subpages/login.php?error=ses");
?>