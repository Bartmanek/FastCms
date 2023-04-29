<?php
include('./db.php');

$user_id = $_GET['name'];
$admin_stat = $_GET['admin'];

if ($admin_stat != 1) {
    $sql = "UPDATE user SET admin=\"1\" WHERE id=\"$user_id\";";
    mysqli_query($conn, $sql);
    header("Location: ../subpages/admin/users.php?error=prom");

} else {
    header("Location: ../subpages/admin/users.php?error=admin");

}

?>