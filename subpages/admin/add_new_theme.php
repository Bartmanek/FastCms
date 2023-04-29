<?php
include('../../scripts-php/auth.php');
include('../../scripts-php/db.php');
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add new style</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/admin_panel_main.css" />
    <link rel="stylesheet" href="../../styles/admin_add_theme.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="./users.php"><i class="fa-solid fa-user-group"></i> Users</a>
                <a href="./users_galleries.php">&nbsp;&nbsp;<i class="fa-solid fa-file"></i>&nbsp;&nbsp;Users
                    galleries</a>
                <div class="checked">
                    <a href="./add_new_theme.php"><i class="fa-solid fa-screwdriver-wrench"></i> Add new gallery
                        style</a>
                </div>
                <a href="./messages.php"><i class="fa-solid fa-envelope"></i> Messages from users</a>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Add gallery theme:</h1>
            <form action="../../scripts-php/add_theme.php" class="add" method="POST" enctype="multipart/form-data">
                <label for="theme_name">THEME NAME</label>
                <input type="text" name="theme_name" id="name" placeholder="ENTER THEME NAME">
                <label for="the_file">THEME FILE</label>
                <label for="file" class="custom_file">CHOOSE FILE</label>
                <input type="file" name="the_file" id="file" placeholder="CHOOSE FILE">
                <label for="photo">THEME PHOTO EXAMPLE</label>
                <label for="photo" class="custom_file">CHOOSE FILE</label>
                <input type="file" class="custom_file" name="photo" id="photo">
                <label for="descr">THEME DESCRIPTION</label>
                <textarea type="text" name="descr" id="descr" placeholder="ENTER DESCRIPTION" /></textarea>
                <input type="submit" value="SUBMIT">
                <?php
                if (!empty($_GET['error'])) {
                    if ($_GET['error'] == 'Fill all data') {
                        echo "<div class=\"error_mes\">Fill all data</div>";
                    } else if ($_GET['error'] == 'File exists') {
                        echo "<div class=\"error_mes\">File is already on server</div>";
                    } else if ($_GET['error'] == 'Photo exists') {
                        echo "<div class=\"error_mes\">Photo is already on server</div>";
                    } else if ($_GET['error'] == 'added') {
                        echo "<div class=\"conf_mes\">Added</div>";
                    }
                }
                ?>
            </form>
        </div>
</body>

</html>