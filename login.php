<?php
// (A) LOGIN CHECKS
require "check.php";

// (B) LOGIN PAGE HTML ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="dk.png">
    <script src="script.js"></script>
  </head>

  <body>

  
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Bisma Group > Login</span></div>
        <form id="login-form" method="post" target="_self">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="User" name="user" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
          </div>
          <?php if (isset($failed)) { ?>
            <div class="pass" id="bad-login">Ups..!! User atau password salah!!</div>
          <?php } ?>
          
          <div class="row button">
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>

  </body>
</html>

