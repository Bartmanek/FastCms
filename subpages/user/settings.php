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
    <title>Settings</title>
    <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../styles/user_panel_main.css" />
    <link rel="stylesheet" href="../../styles/user_settings.css" />
</head>

<body>
    <div class="content">
        <div class="panel">
            <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
            <div class="nav">
                <div class="blur"></div>
                <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="./create_gallery.php"><i class="fa-solid fa-screwdriver-wrench"></i> Create gallery</a>
                <a href="./view_galleries.php"><i class="fa-solid fa-file"></i> Your galleries</a>
                <div class="down">
                    <div class="checked">
                        <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    </div>
                    <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="main">
            <h1 class="heading">Settings</h1>
            <h1 class="form_heading">Change password</h1>
            <div class="flex">
                <form action="../../scripts-php/user_change_password.php" method="post">
                    <label for="password">OLD PASSWORD</label>
                    <input type="password" name="old_pass" id="password" placeholder="ENTER OLD PASSWORD">
                    <label for="password2">NEW PASSWORD</label>
                    <input type="password" name="pass" id="password2" placeholder="ENTER NEW PASSWORD">
                    <label for="password3">REPEAT PASSWORD</label>
                    <input type="password" name="pass2" id="password3" placeholder="ENTER NEW PASSWORD">
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == 'Fill all data') {
                            echo "<div class=\"error_mes\">Fill all data</div>";
                        } else if ($_GET['error'] == "Passwords don't match") {
                            echo "<div class=\"error_mes\">Passwords don't match</div>";
                        } else if ($_GET['error'] == 'Incorrect password') {
                            echo "<div class=\"error_mes\">Incorrect password</div>";
                        } else if ($_GET['error'] == 'You entered same password') {
                            echo "<div class=\"error_mes\">You entered same password</div>";
                        } else if ($_GET['error'] == 'Done') {
                            echo "<div class=\"conf_mes\">Password changed</div>";
                        }
                    }
                    ?>
                    <input type="submit" value="CHANGE">
                </form>
                <div class="cont">
                    <a class="button" href="../contact.php">CONTACT ADMIN</a>
                    <a class="button" id="delete">DELETE ACCOUNT</a>
                </div>
            </div>
        </div>
        <script src="../../scripts-js/user_sure.js"></script>

</body>

</html>