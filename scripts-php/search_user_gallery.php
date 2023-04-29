<?php
include('./db.php');
$query = $_GET['query'];

$result = array();

$sql = "SELECT user.id, user.username, user.admin, projects.id, projects.userID, projects.galleryName FROM user INNER JOIN projects ON user.id=projects.userID WHERE projects.galleryName LIKE \"%$query%\";";
$que = mysqli_query($conn, $sql);
$i = 0;
if (mysqli_num_rows($que) == 0) {
    $result = array("No result");
}

while ($rows = mysqli_fetch_array($que)) {
    $result[$i][0] = $rows[3];
    $result[$i][1] = $rows[5];
    $result[$i][2] = $rows[1];
    $result[$i][3] = $rows[2];
    $result[$i][4] = $rows[0];
    $i++;
}


echo json_encode($result);
?>