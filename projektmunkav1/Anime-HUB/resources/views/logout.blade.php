<?php
session_start();
// Cookie értékének beállítása "no"-ra
setcookie('loggedin', 'no', time() + 3600, "/"); // A "no" érték, az érvényesség időtartama és a path beállítása
$_SESSION['user_id'] = null;
header("Location: login");
exit();
?>
