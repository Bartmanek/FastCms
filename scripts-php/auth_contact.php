<?php
include('./db.php');

$email = $_POST['email'];
$topic = $_POST['topic'];
$cont = $_POST['content'];

if (isset($email) && isset($topic) && isset($cont)) {
    $sql = "INSERT INTO contact(email, topic, content) VALUES (\"$email\", \"$topic\", \"$cont\");";
    mysqli_query($conn, $sql);
    header("Location: ../subpages/contact.php?error=Send");
} else {
    header("Location: ../subpages/contact.php?error=Fill all data");
}
?>