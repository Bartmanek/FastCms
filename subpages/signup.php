<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign up</title>
  <link rel="stylesheet" href="../styles/main.css" />
  <link rel="stylesheet" href="../styles/signup.css" />
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
    <h1 class="heading">Register</h1>
    <form class="cont" action="../scripts-php/auth_signup.php" method="post">
      <label for="name">USERNAME</label>
      <input type="text" name="name" id="form_username" placeholder="ENTER USERNAME" value="<?php
      if (isset($_GET['name'])) {
        $name = $_GET['name'];
        echo "$name";
      }
      ?>" />
      <label for="email">EMAIL</label>
      <input type="email" name="email" id="form_email" placeholder="ENTER EMAIL" value="<?php
      if (isset($_GET['email'])) {
        $email = $_GET['email'];
        echo "$email";
      }
      ?>" />
      <label for="password">PASSWORD</label>
      <input type="password" name="pass" id="form_pass" placeholder="ENTER PASSWORD" />
      <label for="password2">REPEAT PASSWORD</label>
      <input type="password" name="pass2" id="form_pass2" placeholder="ENTER SAME PASSWORD" />
      <?php
      if (!empty($_GET['error'])) {
        if ($_GET['error'] == 'Fill all data') {
          echo "<div class=\"error_mes\">Fill all data</div>";
        } else if ($_GET['error'] == 'Email and username already in use') {
          echo "<div class=\"error_mes\">Email and username already in use</div>";
        } else if ($_GET['error'] == 'Email already in use') {
          echo "<div class=\"error_mes\">Email already in use</div>";
        } else if ($_GET['error'] == 'Username already in use') {
          echo "<div class=\"error_mes\">Username already in use</div>";
        } else if ($_GET['error'] == 'Passwords don\'t match') {
          echo "<div class=\"error_mes\">Passwords don't match</div>";
        }
      }
      ?>
      <input type="submit" value="Submit" />
    </form>
    <span class="info">Already have account? Login <a href="./login.php"
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