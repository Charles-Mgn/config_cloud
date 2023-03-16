<?php
// Start a session to store user data
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
    <meta charset="UTF-8" />
    <title>Cloud</title>
    <style>
        html {
            background-color: #333;
            color: #eee;
            font-family: Roboto, sans-serif;
        }
        head {
            display: none;
        }
        * {
            display: block;
        }
        body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 2px solid orange;
            padding: 30px;
        }
        input {
            background-color: transparent;
            border: none;
            border-bottom: 1px solid orange;
            margin-bottom: 10px;
            width: 100%;
        }
        input[type="submit"], a {
            background-color: orange;
            color: #eee;
            border: 2px solid orange;
            transition: .3s;
            padding: 15px;
            margin-top: 30px;
        }
        input[type="submit"]:hover, a {
            background-color: transparent;
        }
    </style>
</head>
<body>
    <h1>Welcome on Cloud</h1>
    <h2>Login</h2>
    <form method="post" action="login.php">
        <label for="username">username</label>
        <input type="text" name="username">
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="submit">
    </form>
    <a href="/register.php">Don't have an account yet?</a>
</body>
</html>
