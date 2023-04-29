<?php
include('./db.php');
include('./auth.php');
settype($id, 'int');

$sql = "DELETE FROM user WHERE id=\"$id\"";
mysqli_query($conn, $sql);
unset($_COOKIE['auth_token']);
setcookie("auth_token", " ", time() - 10800, "/");
session_unset();
session_destroy();
header("Location: ../subpages/login.php?error=ses");
?>