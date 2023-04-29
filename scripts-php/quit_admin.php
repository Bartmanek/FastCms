<?php
include('./db.php');

$sql = "UPDATE user SET admin=0;";
$result = mysqli_query($conn, $sql);
header("Location: ../subpages/user/dashboard.php");
?>