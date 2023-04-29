<?php
include('./db.php');

$gallery_id = $_GET['name'];
$user_id = $_GET['user'];

$sql = "SELECT galleryName FROM projects WHERE id=\"$gallery_id\";";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

$sql2 = "SELECT username FROM user WHERE id=\"$user_id\";";
$result2 = mysqli_query($conn, $sql2);
$rows2 = mysqli_fetch_array($result2);
header("Location: ../user/$rows2[0]/$rows[0].php");

?>