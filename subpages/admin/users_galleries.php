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
    <title>Users</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/admin_panel_main.css" />
    <link rel="stylesheet" href="../../styles/admin_users_galleries.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="./users.php"><i class="fa-solid fa-user-group"></i> Users</a>
                <div class="checked">
                    <a href="./users_galleries.php">&nbsp;<i class="fa-solid fa-file"></i>&nbsp;&nbsp;Users
                        galleries</a>
                </div>
                <a href="./add_new_theme.php"><i class="fa-solid fa-screwdriver-wrench"></i> Add new gallery style</a>
                <a href="./messages.php"><i class="fa-solid fa-envelope"></i> Messages from users</a>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Users galleries:</h1>
            <input onkeyup="showMess(this.value)" type="text" class="search" name="emailAddress"
                placeholder="&#xf002; SEARCH BY GALLERY NAME">
            <?php
            if (!empty($_GET['error'])) {
                if ($_GET['error'] == 'del') {
                    echo "<div class=\"conf_mes\">Deleated</div>";
                } else if ($_GET['error'] == 'admintoo') {
                    echo "<div class=\"error_mes\">Gallery is made by admin</div>";
                }
            }
            ?>
            <div class="mes_cont">
                <div class="messages">
                    <div class="legend">
                        <span class="gallery">Gallery name</span>
                        <span class="username">Username</span>
                        <span class="admin">Is creator an admin?</span>
                        <span class="action">Action</span>
                    </div>
                    <?php
                    $sql = "SELECT user.id, user.username, user.admin, projects.id, projects.userID, projects.galleryName FROM user INNER JOIN projects ON user.id=projects.userID;";
                    $result = mysqli_query($conn, $sql);
                    $length = count($rows) / 4;

                    while ($rows = mysqli_fetch_array($result)) {
                        if ($rows[2] == 1) {
                            $rank = "Yes";
                        } else {
                            $rank = "No";
                        }
                        echo "<div class=\"element\">";
                        echo "<span class=\"gallery\">$rows[5]</span>";
                        echo "<span class=\"username\">$rows[1]</span>";
                        echo "<span class=\"admin\">$rank</span>";
                        echo "<span class=\"action\"><a rel=\"$rows[0]\" id=\"view\" class=\"but\" name=\"$rows[3]\"><i class=\"fa-solid fa-eye\"></i></a><a rel=\"$rows[0]\" id=\"del\" name=\"$rows[3]\" type=\"$rows[2]\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="../../scripts-js/serach_users_galleries.js"></script>
</body>

</html>