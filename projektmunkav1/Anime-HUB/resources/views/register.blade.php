<?php
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logregcss.css">
    <title>Regisztráció</title>
</head>
<body>

<h2>Regisztráció</h2>

<!-- Regisztrációs űrlap -->
<form method="post" action="registeracces.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <button type="submit">Register</button>
</form>

</body>
</html>
