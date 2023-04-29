<?php
unset($_COOKIE['auth_token']);
setcookie("auth_token", " ", time() - 10800, "/");
session_start();
session_unset();
session_destroy();
header("Location: ../subpages/login.php?error=Succesfull logout");
?>