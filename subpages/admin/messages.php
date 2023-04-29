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
    <title>Users messages</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/admin_panel_main.css" />
    <link rel="stylesheet" href="../../styles/admin_mess.css" />
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
                <a href="./add_new_theme.php"><i class="fa-solid fa-screwdriver-wrench"></i> Add new gallery style</a>
                <div class="checked">
                    <a href="./messages.php"><i class="fa-solid fa-envelope"></i> Messages from users</a>
                </div>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Messages:</h1>
            <input onkeyup="showMess(this.value)" type="text" class="search" name="emailAddress"
                placeholder="&#xf002; SEARCH MESSAGE BY TOPIC">
            <?php
            if (!empty($_GET['error'])) {
                if ($_GET['error'] == 'del') {
                    echo "<div class=\"conf_mes\">Deleated</div>";
                }
            }
            ?>
            <div class="mes_cont">
                <div class="messages">
                    <div class="legend">
                        <span class="email">Email</span>
                        <span class="topic">Topic</span>
                        <span class="cont_of">Content</span>
                        <span class="action">Action</span>
                    </div>
                    <?php
                    $sql = "SELECT id, email, topic, content FROM contact;";
                    $result = mysqli_query($conn, $sql);
                    $length = count($rows) / 4;
                    $_SESSION['contact_id'] = $rows[0];

                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<div class=\"element\">";
                        echo "<span class=\"email\">$rows[1]</span>";
                        echo "<span class=\"topic\">$rows[2]</span>";
                        echo "<span class=\"cont_of\">$rows[3]</span>";
                        echo "<span class=\"action\"><a class=\"but\" href=\"mailto:$rows[1]\"><i class=\"fa-solid fa-comments\"></i></a><a id=\"del\" name=\"$rows[0]\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="../../scripts-js/search_mes.js"></script>
</body>

</html>