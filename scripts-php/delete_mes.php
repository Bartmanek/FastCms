<?php
include('./db.php');
settype($id, 'int');

$id = $_GET['name'];

$sql = "DELETE FROM contact WHERE id=\"$id\"";
mysqli_query($conn, $sql);
header("Location: ../subpages/admin/messages.php?error=del");
?>