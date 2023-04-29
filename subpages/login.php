<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/login.css" />
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
    <h1 class="heading">Login</h1>
    <form class="cont" action="../scripts-php/auth_login.php" method="post">
      <label for="email">EMAIL or USERNAME</label>
      <input type="text" name="email" id="form_email" placeholder="ENTER EMAIL OR USERNAME" value="<?php
      if (isset($_GET['email'])) {
        $email = $_GET['email'];
        echo "$email";
      }
      ?>" />
      <label for="password">PASSWORD</label>
      <input type="password" name="password" id="form_pass" placeholder="ENTER PASSWORD" />
      <?php
      if (!empty($_GET['error'])) {
        if ($_GET['error'] == 'Fill all data') {
          echo "<div class=\"error_mes\">Fill all data</div>";
        } else if ($_GET['error'] == 'Incorrect email or password') {
          echo "<div class=\"error_mes\">Incorrect email or password</div>";
        } else if ($_GET['error'] == 'Done') {
          echo "<div class=\"conf_mes\">Account created successfully</div>";
        } else if ($_GET['error'] == 'ses') {
          echo "<div class=\"error_mes\">Seesion expierd</div>";
        } else if ($_GET['error'] == 'Succesfull logout') {
          echo "<div class=\"conf_mes\">Succesfull logout</div>";
        }
      }
      ?>
      <input type="submit" value="LOGIN" />
    </form>
    <span class="info">Don't have account? Reapair that <a href="./signup.php"
        style="text-decoration:underline;">here!</a></span>
  </div>
  <div class="footer">
    <span id="contact"><a href="./contact.php">Contact</a></span>
    <span id="credits"><a href="https://www.github.com/Bartmanek">Bartosz Mędrek&copy;</a></span>
  </div>
  <script src="../scripts-js/menu.js"></script>
  <script src="../scripts-js/check_window_size.js"></script>

</body>

</html>