<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <title>Anime-HUB</title>
  <script src="js/main.js" defer></script>
  <link rel="stylesheet" href="style.css">
  <script>
    window.onbeforeunload = function() {
    // Ellenőrizzük, hogy az oldal bezárás vagy frissítés miatt történik-e a távozás
    if (performance.navigation.type === 1) {
        // Az oldal frissítésének esetén
        location.reload(true);
    }
};
  </script>
</head>
<body>

<?php
// Ellenőrizzük, hogy a felhasználó be van-e jelentkezve
if (isset($_SESSION['user_id'])){
    // Ha be van jelentkezve, megjelenítjük a fiókom oldalt és a kijelentkezés linket
    echo '
    <header>
        <div class="title"><p>Anime-Hub</p></div>
        <nav class="links">
            <a href="/">Home</a>
            <a href="Animes">Animes</a>
            <a href="latest">Latest</a>
            <a href="mylist">My List</a>
            <a href="account">Account</a>
            <a href="logout">Log out</a>
        </nav>
        <div class="search">
            <input class="search-bar" id="kereso" placeholder="Search">
        </div>
    </header>';
} else {
    // Ha nincs bejelentkezve, megjelenítjük a bejelentkezés és regisztráció linkeket
    echo '
    <header>
        <div class="title"><p>Anime-Hub</p></div>
        <nav class="links">
            <a href="/">Home</a>
            <a href="Animes">Animes</a>
            <a href="latest">Latest</a>
            <a href="login">Log in</a>
            <a href="register">Register</a>
        </nav>
        <div class="search">
            <input class="search-bar" id="kereso" placeholder="Search">
        </div>
    </header>';
}
?>
