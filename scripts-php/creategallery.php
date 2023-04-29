<?php
include('./auth.php');
include('./db.php');

$get = $_GET['elements'];
$result = json_decode($get);
$theme = $_GET['theme'];
$name = $_GET['name'];
$header = $_GET['header'];
$main = $_GET['main'];
$addon = $_GET['addon'];
$font = $_GET['font'];

settype($id, 'int');

$sql_gallery = "INSERT INTO projects (userID, galleryName, galleryHeader, themeType, firstColour, secondColour, fontColour) VALUES(\"$id\", \"$name\", \"$header\", \"$theme\", \"$main\", \"$addon\", \"$font\");";

if (mysqli_query($conn, $sql_gallery)) {
    $pid = mysqli_insert_id($conn);
}

foreach ($result as $cur) {
    $link = $cur->link;
    $caption = $cur->caption;
    $type = $cur->type;

    $sql = "INSERT INTO photogallery (projectID, photoURL, photoCaption, type) VALUES (\"$pid\", \"$link\", \"$caption\", \"$type\")";
    mysqli_query($conn, $sql);
}

$sqls = "SELECT username FROM user WHERE id=$id";
$result = mysqli_query($conn, $sqls);

while ($rows = mysqli_fetch_array($result)) {
    $username = $rows[0];
}

$txt = "<?php \$id = $id; \$name = \"$name\"; ?>";

$text = file_get_contents('../user/template.php');

$ready = $txt . $text;

$newFile = fopen("../user/$username/$name.php", "w");
fwrite($newFile, $ready);
fclose($newFile);
header("Location: ../subpages/user/view_galleries.php?error=good");
?>