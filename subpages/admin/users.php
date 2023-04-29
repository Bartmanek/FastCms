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
    <link rel="stylesheet" href="../../styles/admin_users.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <div class="checked">
                    <a href="./users.php"><i class="fa-solid fa-user-group"></i> Users</a>
                </div>
                <a href="./users_galleries.php">&nbsp;&nbsp;<i class="fa-solid fa-file"></i>&nbsp;&nbsp;Users
                    galleries</a>
                <a href="./add_new_theme.php"><i class="fa-solid fa-screwdriver-wrench"></i> Add new gallery style</a>
                <a href="./messages.php"><i class="fa-solid fa-envelope"></i> Messages from users</a>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Users:</h1>
            <input onkeyup="showMess(this.value)" type="text" class="search" name="emailAddress"
                placeholder="&#xf002; SEARCH USER BY NAME">
            <?php
            if (!empty($_GET['error'])) {
                if ($_GET['error'] == 'del') {
                    echo "<div class=\"conf_mes\">Deleated</div>";
                } else if ($_GET['error'] == 'prom') {
                    echo "<div class=\"conf_mes\">Promoted</div>";
                } else if ($_GET['error'] == 'admin') {
                    echo "<div class=\"error_mes\">User is already an admin</div>";
                } else if ($_GET['error'] == 'admintoo') {
                    echo "<div class=\"error_mes\">User is an admin too</div>";
                }
            }
            ?>
            <div class="mes_cont">
                <div class="messages">
                    <div class="legend">
                        <span class="email">Email</span>
                        <span class="username">Username</span>
                        <span class="admin">Is admin?</span>
                        <span class="action">Action</span>
                    </div>
                    <?php
                    $sql = "SELECT id, email, username, admin FROM user;";
                    $result = mysqli_query($conn, $sql);
                    $length = count($rows) / 4;

                    while ($rows = mysqli_fetch_array($result)) {
                        if ($rows[3] == 1) {
                            $rank = "Yes";
                        } else {
                            $rank = "No";
                        }
                        echo "<div class=\"element\">";
                        echo "<span class=\"email\">$rows[1]</span>";
                        echo "<span class=\"username\">$rows[2]</span>";
                        echo "<span class=\"admin\">$rank</span>";
                        echo "<span class=\"action\"><a rel=\"$rows[3]\" id=\"prom\" class=\"but\" name=\"$rows[0]\"><i class=\"fa-solid fa-arrow-up\"></i></a><a rel=\"$rows[3]\" id=\"del\" name=\"$rows[0]\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="../../scripts-js/search_user.js"></script>
</body>

</html>