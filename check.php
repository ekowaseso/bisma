<?php
// (A) START SESSION
session_start();

// (B) HANDLE LOGIN
if (isset($_POST["user"]) && !isset($_SESSION["user"])) {
  // (B1) USERS & PASSWORDS - SET YOUR OWN !

  $jsonFile = file_get_contents('user.json');
  $u = json_decode($jsonFile, true);

  $users = [
    $u["user"] => $u["pass"]
  ];

  // (B2) CHECK & VERIFY
  if (isset($users[$_POST["user"]])) {
    if ($users[$_POST["user"]] == $_POST["password"]) {
      $_SESSION["user"] = $_POST["user"];
    }
  }

  // (B3) FAILED LOGIN FLAG
  if (!isset($_SESSION["user"])) { $failed = true; }
}

// (C) REDIRECT USER TO HOME PAGE IF SIGNED IN
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

if (isset($_SESSION["user"])) {
  header('Location: ' . $home_url); // SET YOUR OWN HOME PAGE!
  exit();
}
