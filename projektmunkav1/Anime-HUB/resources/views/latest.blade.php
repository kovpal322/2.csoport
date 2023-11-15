<?php
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="stylesheet" href="animes.css">
</head>
<body>
    <section id="home">
        <h1>The Latest Animes</h1>
        <div class="container" id="anime-list">
            <!-- Az animék listája itt jelennek meg dinamikusan -->
            </div>
    </section>
    <script>
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "backend.php", true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                var animelist = JSON.parse(xhr.responseText);
                var container = document.getElementById("anime-list");

                // Az animelist tömb fordítása (az utolsó elem legyen az első)
                var reversedAnimeList = animelist.reverse();

                // Csak az első 5 elemet kiválasztjuk (azaz az eredeti utolsó 5 elemet)
                var firstFiveAnime = reversedAnimeList.slice(0, 5);

                firstFiveAnime.forEach(function (anime) {
                    var productDiv = document.createElement("div");
                    productDiv.className = "anime";

                    var img = document.createElement("img");
                    img.src = anime.cover_image;
                    img.alt = anime.title;
                    productDiv.appendChild(img);

                    var title = document.createElement("h2");
                    title.textContent = anime.title;
                    productDiv.appendChild(title);

                    container.appendChild(productDiv);
                });
            }
        };
        xhr.send();

    </script>
</body>
</html>