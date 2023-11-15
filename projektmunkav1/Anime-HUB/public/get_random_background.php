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

// Véletlenszerű háttérkép lekérdezése
$sql = "SELECT * FROM backgroundimages ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $backgroundData = array(
        'image_path' => $row['image_path']
    );
    echo json_encode($backgroundData);
} else {
    echo "No background found";
}

$conn->close();
?>
