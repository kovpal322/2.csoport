<?php
// Adatbázis kapcsolódás
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anime_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Véletlenszerű anime lekérdezése
$sql = "SELECT animes.*, categories.category_name
        FROM animes
        JOIN categories ON animes.category_id = categories.category_id
        ORDER BY RAND()
        LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $animeData = array(
        'title' => $row['title'],
        'category_name' => $row['category_name'],
        'description' => $row['description']
    );
    echo json_encode($animeData);
} else {
    echo "No anime found";
}

$conn->close();
?>
