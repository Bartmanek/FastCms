<?php
include('./db.php');
$query = $_GET['query'];

$result = array();

$sql = "SELECT id, galleryName, userID FROM projects WHERE galleryName LIKE \"%$query%\";";
$que = mysqli_query($conn, $sql);
$i = 0;
if (mysqli_num_rows($que) == 0) {
    $result = array("No result");
}

while ($rows = mysqli_fetch_array($que)) {
    $result[$i][0] = $rows[0];
    $result[$i][1] = $rows[1];
    $result[$i][2] = $rows[2];
    $i++;
}


echo json_encode($result);
?>