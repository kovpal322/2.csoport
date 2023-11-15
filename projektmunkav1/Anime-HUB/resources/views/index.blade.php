<?php
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
 <main>

 <div class="details">
    <h1 id="animeTitle">Anime cím</h1>
    <p>Category: <span id="animeCategory">0</span></p>
    <p id="animeDescription">Description: </p>
    <img src="" alt="" id="animeimage">
    <div class="buttons">
      <?php
    if (isset($_SESSION['user_id'])){
    // Ha be van jelentkezve, megjelenítjük a fiókom oldalt és a kijelentkezés linket
    echo '<button class="list-btn">+MYLIST</button>';
    }
    ?>
      
    </div>
  </div>
 </main>
 
</body>
</html>