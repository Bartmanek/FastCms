<?php
include('./db.php');

$id = $_GET['name'];
$sql = "DELETE FROM projects WHERE id=\"$id\";";
mysqli_query($conn, $sql);
header("Location: ../subpages/user/view_galleries.php?error=del");

?>