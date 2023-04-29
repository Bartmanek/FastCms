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
    <title>View galleries</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/user_panel_main.css" />
    <link rel="stylesheet" href="../../styles/user_your_g.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="./create_gallery.php"><i class="fa-solid fa-screwdriver-wrench"></i> Create gallery</a>
                <div class="checked">
                    <a href="./view_galleries.php"><i class="fa-solid fa-file"></i> Your galleries</a>
                </div>
                <div class="down">
                    <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Your galleries:</h1>
            <input onkeyup="showMess(this.value)" type="text" class="search" name="emailAddress"
                placeholder="&#xf002; SEARCH GALLERY">
            <?php
            if (!empty($_GET['error'])) {
                if ($_GET['error'] == 'del') {
                    echo "<div class=\"conf_mes\">Deleated</div>";
                } else if ($_GET['error'] == 'good') {
                    echo "<div class=\"conf_mes\">Gallery created</div>";
                }
            }
            ?>
            <div class="mes_cont">
                <div class="messages">
                    <div class="legend">
                        <span class="gallery">Gallery name</span>
                        <span class="action">Action</span>
                    </div>
                    <?php
                    settype($id, 'INT');
                    $sql = "SELECT id, galleryName, userID FROM projects WHERE userID=\"$id\";";
                    $result = mysqli_query($conn, $sql);
                    $length = count($rows) / 8;

                    while ($rows = mysqli_fetch_array($result)) {
                        echo "<div class=\"element\">";
                        echo "<span class=\"gallery\">$rows[1]</span>";
                        echo "<span class=\"action\"><a rel=\"$rows[2]\" id=\"view\" class=\"but\" name=\"$rows[0]\"><i class=\"fa-solid fa-eye\"></i></a><a id=\"edit\" name=\"$rows[0]\" class=\"but\"><i class=\"fa-solid fa-pen-to-square\"></i></a><a id=\"del\" name=\"$rows[0]\" class=\"but\"><i class=\"fa-solid fa-trash\"></i></a></span>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="../../scripts-js/search_mg.js"></script>
</body>

</html>