<?php include('../scripts-php/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/contact.css" />
</head>

<body>
  <div class="header">
    <span id="logo"><a href="../index.html">FastCms</a></span>
    <div class="nav">
      <a href="./aboutus.html">About us?</a>
      <a href="./whyus.html">Why us?</a>
      <a href="./signup.php">Register</a>
      <a href="./login.php">Login</a>
      <a href="https://www.twitter.com/bartmanekk"><img class="social_logo" src="../assets/twt.png"
          alt="Twitter logo" /></a>
      <a href="https://www.facebook.com/BartmanFB"><img class="social_logo" src="../assets/fb.png"
          alt="Facebook logo" /></a>
    </div>
  </div>
  <div class="header_open">
    <span id="logo"><a href="../index.html">FastCms</a></span>
    <div class="menu_icon">
      <div class="el1"></div>
      <div class="el2"></div>
      <div class="el3"></div>
    </div>
  </div>
  <div class="main">
    <h1 class="heading">Contact</h1>
    <form class="cont" action="../scripts-php/auth_contact.php" method="post">
      <label for="email">EMAIL</label>
      <input type="email" name="email" id="form_email" placeholder="ENTER EMAIL" value="
      <?php
      if (isset($_COOKIE['auth_token'])) {
        $token = $_COOKIE['auth_token'];
        $sql = "SELECT email FROM user WHERE auth_token=\"$token\";";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        echo $row[0];
      }
      ?>
      ">
      <label for="topic">TOPIC</label>
      <input type="text" name="topic" id="form_pass" placeholder="ENTER TOPIC" />
      <label for="content">CONTENT</label>
      <textarea type="text" name="content" id="form_pass" placeholder="ENTER CONTENT" /></textarea>
      <?php
      if (!empty($_GET['error'])) {
        if ($_GET['error'] == 'Fill all data') {
          echo "<div class=\"error_mes\">Fill all data</div>";
        } else if ($_GET['error'] == 'Send')
          echo "<div class=\"conf_mes\">Message sent</div>";
      }
      ?>
      <input type="submit" value="SEND" />
    </form>
    <div class="footer">
      <span id="contact"><a href="./contact.php">Contact</a></span>
      <span id="credits"><a href="https://www.github.com/Bartmanek">Bartosz Mędrek&copy;</a></span>
    </div>
    <script src="../scripts-js/menu.js"></script>
    <script src="../scripts-js/check_window_size.js"></script>
</body>

</html>