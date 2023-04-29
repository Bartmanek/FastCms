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
  <title>User panel</title>
  <script src="https://kit.fontawesome.com/40b2e07baf.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../styles/user_panel_main.css" />
</head>

<body>
  <div class="content">
    <div class="panel">
      <span id="logo"><a href="./dashboard.php">FastCms</a> </span>
      <div class="nav">
        <div class="blur"></div>
        <div class="checked">
          <a href="./dashboard.php"><i class="fa-solid fa-house"></i> Dashboard</a>
        </div>
        <a href="./create_gallery.php"><i class="fa-solid fa-screwdriver-wrench"></i> Create gallery</a>
        <a href="./view_galleries.php"><i class="fa-solid fa-file"></i> Your galleries</a>
        <div class="down">
          <a href="./settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
          <a href="../../scripts-php/logout.php"><i class="fa-solid fa-door-open"></i> Logout</a>
        </div>
      </div>
    </div>
    <div class="main">
      <h1 class="heading">
        Welcome
        <?php
        settype($id, 'string');
        $sql = "SELECT username, join_date FROM user WHERE id=$id;";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($result);
        echo $rows[0];

        ?>!
      </h1>
      <div class="boxes">
        <div class="box">
          Your pages:
          <?php
          $sql2 = "SELECT COUNT(id) FROM projects WHERE userID=$id;";
          $result2 = mysqli_query($conn, $sql2);
          $rows2 = mysqli_fetch_array($result2);
          echo $rows2[0];
          ?>
        </div>
        <div class="box">
          Member since:
          <?php
          echo $rows[1];
          ?>
        </div>
      </div>
      <div class="cont">
        <span class="cont_heading">Our galleries: </span>
        <div class="themes">
          <div class="flex">
            <div class="left_arrow">
              <i class="fa-solid fa-arrow-left-long"></i>
            </div>
            <span id="photoSpace"></span>
            <div class="right_arrow">
              <i class="fa-solid fa-arrow-right-long"></i>
            </div>
          </div>
          <div id="info" class="info">
            <span>Name: <span id="names"></span> </span>
            <span><a id="alert" style="user-select: none;">For description click here!</a></span>
            <div class="desc"><i id="close" class="fa-solid fa-xmark align"></i><span id="desc"></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../../scripts-js/themesGallery.js"></script>
</body>

</html>