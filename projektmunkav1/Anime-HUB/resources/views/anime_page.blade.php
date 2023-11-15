<?php
session_start();
include "header.php";

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "anime_database";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
}

if (isset($_GET['anime_id'])) {
    $anime_id = $_GET['anime_id'];

    $query = "SELECT * FROM animes WHERE anime_id = '$anime_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $anime = $result->fetch_assoc();

        // Kategória nevének lekérése
        $category_id = $anime['category_id'];
        $category_query = "SELECT category_name FROM categories WHERE category_id = '$category_id'";
        $category_result = $conn->query($category_query);
        $category_row = $category_result->fetch_assoc();
        $category_name = $category_row['category_name'];

        // Kommentek lekérése
        $comment_query = "SELECT * FROM anime_comments WHERE anime_id = '$anime_id'";
        $comment_result = $conn->query($comment_query);
        $comments = array();

        while ($comment_row = $comment_result->fetch_assoc()) {
            $comments[] = array(
                'user_id' => $comment_row['user_id'],
                'comment' => $comment_row['comment'],
                'timestamp' => $comment_row['timestamp']
            );
        }
    } else {
        // Ha nincs találat, visszairányít a kezdőoldalra vagy megfelelő hibaoldalra.
        header("Location: /");
        exit();
    }
} else {
    // Ha nincs megadva anime_id, visszairányít a kezdőoldalra vagy megfelelő hibaoldalra.
    header("Location: /");
    exit();
}

// További kód az anime részletes adatainak megjelenítésére, például a leírás, kategória, kommentek stb.
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $anime['title']; ?> - Anime oldal</title>
    <link rel="stylesheet" href="anime_pagestyle.css">
</head>
<body>

<div class="anime-details">
    <div class="container">
        <div class="anime-image">
            <img src="<?php echo $anime['cover_image']; ?>" alt="<?php echo $anime['title']; ?>">
        </div>
        <div class="anime-info">
            <h1><?php echo $anime['title']; ?></h1>
            <p><strong>Kategória:</strong> <?php echo $category_name; ?></p>
            <p><strong>Leírás:</strong> <?php echo $anime['description']; ?></p>
        </div>
    </div>
</div>

<h2>Kommentek</h2>
<ul id="commentsList">
    <?php foreach ($comments as $comment): ?>
        <li>
            <p><strong>Felhasználó:</strong> <?php echo $comment['user_id']; ?></p>
            <p><strong>Comment:</strong> <?php echo $comment['comment']; ?></p>
            <p><strong>Időbélyeg:</strong> <?php echo $comment['timestamp']; ?></p>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Itt lehetne hozzáadni egy űrlapot a komment írásához -->
<!-- Példa: -->
<form id="commentForm">
    <input type="hidden" name="anime_id" value="<?php echo $anime_id; ?>">
    <label for="comment">Hozzászólás:</label>
    <textarea name="comment" id="comment" cols="30" rows="3" required></textarea>
    <button type="submit">Hozzáadás</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
var commentForm = document.getElementById("commentForm");

commentForm.addEventListener("submit", function(event) {
    event.preventDefault();

    var commentText = document.getElementById("comment").value;
    var animeId = <?php echo $anime_id; ?>;

    // AJAX kérés küldése a komment hozzáadásához
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_comment.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Sikeres kérés esetén a komment hozzáadása az oldalhoz
            var commentsList = document.getElementById('commentsList');
            var comment = JSON.parse(xhr.responseText);

            var li = document.createElement('li');
            li.innerHTML = "<p><strong>Felhasználó:</strong> " + comment.username + "</p>" +
                            "<p><strong>Comment:</strong> " + comment.comment + "</p>" +
                            "<p><strong>Időbélyeg:</strong> " + comment.timestamp + "</p>";

            commentsList.appendChild(li);

            // Töröljük a komment űrlap tartalmát
            commentForm.reset();
        }
    };

    // Elküldjük a user_id-t is
    xhr.send("anime_id=" + animeId + "&comment=" + commentText + "&user_id=" + <?php echo $_SESSION['user_id']; ?>);
});

</script>

</body>
</html>
