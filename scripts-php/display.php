<?php
include('./db.php');
$sql = "SELECT id, name, photoPath, description FROM themes;";
$query = mysqli_query($conn, $sql);
$themes = array();
$i = 0;

while ($rows = mysqli_fetch_array($query)) {
    $themes[$i][0] = $rows[0];
    $themes[$i][1] = $rows[1];
    $themes[$i][2] = $rows[2];
    $themes[$i][3] = $rows[3];

    $i++;
}

echo json_encode($themes);
?>