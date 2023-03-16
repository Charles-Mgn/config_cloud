<?php
session_start();
// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header('Location: profile.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Create User</title>
    <style>
    head { display: none; }
    html {
      background-color: #333;
      color: #eee;
      font-family: Roboto, sans-serif;
    }
    body {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      border: 2px solid orange;
      padding: 30px;
    }
    * {
      display: block;
    }
    input {
      background-color: transparent;
      border: none;
      border-bottom: 1px solid orange;
      margin-bottom: 10px;
      width: 100%;
    }
    input[type="submit"] {
      background-color: orange;
      color: #fff;
      border: 2px solid orange;
      transition: .3s;
      padding: 15px;
      margin-top: 30px;
    }
    input[type="submit"]:hover {
      background-color: transparent;
    }
    </style>
  </head>
  <body>
    <h1>Create an account</h1>
    <form method="post" action="create_user.php">
      <h2>Your profile informations</h2>
      <label for="username">Username</label>
      <input type="text" name="username">
      <label for="password">Password</label>
      <input type="password" name="password">
      <h2>Your database informations</h2>
      <input type="submit">
    </form>
  </body>
</html>
