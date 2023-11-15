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

            animelist.forEach(function (anime) {
                var productDiv = document.createElement("div");
                productDiv.className = "anime";

                var img = document.createElement("img");
                img.src = anime.cover_image;
                img.alt = anime.title;
                productDiv.appendChild(img);

                var title = document.createElement("h2");
                title.textContent = anime.title;
                
                productDiv.addEventListener("mouseover", function() {
                    productDiv.style.cursor = "pointer";
                });

                // Hozzáadunk egy eseményfigyelőt a címre, hogy az animére kattintva betöltse az adott oldalt
                title.addEventListener("click", function() {
                    window.location.href = "anime_page?anime_id=" + anime.anime_id;
                });
                // Hozzáadunk egy eseményfigyelőt a képre kattintáshoz, hogy az animére kattintva betöltse az adott oldalt
                img.addEventListener("click", function() {
                    window.location.href = "anime_page?anime_id=" + anime.anime_id;
                });


                productDiv.appendChild(title);

                container.appendChild(productDiv);
            });
        }
    };
    xhr.send();

    var keresoInput = document.getElementById("kereso");
    keresoInput.addEventListener("input", function () {
        var szoveg = keresoInput.value.toLowerCase();
        var productDivs = document.querySelectorAll(".anime");

        productDivs.forEach(function (div) {
            var cim = div.querySelector("h2").textContent.toLowerCase();
            if (cim.includes(szoveg)) {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        });
    });
    </script>
</body>
</html>
