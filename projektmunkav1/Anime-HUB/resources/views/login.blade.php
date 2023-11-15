<?php

include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="logregcss.css">
</head>
<body>

<h2>Bejelentkezés</h2>

<!-- Bejelentkezési űrlap -->
<form method="post" action="loginacces.php">
    <label for="username" >Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="checkbox" id="stayLoggedIn" name="stayLoggedIn"> Stay Logged In
    <br>
    <button type="submit">Log In</button>
</form>

</body>
</html>
