<?php
include('./db.php');

$name = $_POST['theme_name'];
$file = $_FILES['the_file']['name'];
$fileTMP = $_FILES['the_file']['tmp_name'];
$photo = $_FILES['photo']['name'];
$photoTMP = $_FILES['photo']['tmp_name'];
$descr = $_POST['descr'];


if (isset($name) && isset($file) && isset($photo) && isset($descr)) {
    $target_file = '../../assets/themes/themesFile/';
    $target_photo = '../../assets/themes/themesPhoto/';

    $file_send = $target_file . basename($file);
    $photo_send = $target_photo . basename($photo);
    if (file_exists($file_send)) {
        header("Location: ../subpages/admin/add_new_theme.php?error=File exists");
    } else if (file_exists($photo_send)) {
        header("Location: ../subpages/admin/add_new_theme.php?error=Photo exists");
    } else {
        if (move_uploaded_file($fileTMP, $file_send) && move_uploaded_file($photoTMP, $photo_send)) {
            $sql = "INSERT INTO themes(name, photoPath, filePath, description) VALUES(\"$name\", \"../$photo_send\", \"../$file_send\", \"$descr\")";
            mysqli_query($conn, $sql);
            header("Location: ../subpages/admin/add_new_theme.php?error=added");
        }
    }
} else {
    header("Location: ../subpages/admin/add_new_theme.php?error=Fill all data");
}
?>