<?php
include('./db.php');

$user_id = $_GET['name'];
$admin_stat = $_GET['admin'];

if ($admin_stat != 1) {
    $sql = "DELETE FROM user WHERE id=\"$user_id\";";
    $sql2 = "DELETE FROM projects WHERE userID=\"$user_id\"";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);
    header("Location: ../subpages/admin/users.php?error=del");
} else {
    header("Location: ../subpages/admin/users.php?error=admintoo");
}
?>