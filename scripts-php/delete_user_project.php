<?php
include('./db.php');

$project_id = $_GET['project_id'];
$user_id = $_GET['user_id'];
$admin_stat = $_GET['admin'];

if ($admin_stat != 1) {
    $sql = "DELETE FROM projects WHERE id=\"$project_id\" AND userID=\"$user_id\";";
    mysqli_query($conn, $sql);
    header("Location: ../subpages/admin/users_galleries.php?error=del");
} else {
    header("Location: ../subpages/admin/users_galleries.php?error=admintoo");
}
?>