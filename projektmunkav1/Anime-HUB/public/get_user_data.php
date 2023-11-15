<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "anime_database";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE user_id = '$user_id'";
$result = $conn->query($query);

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['username'] = $row['username'];
    $response['email'] = $row['email'];
}

$conn->close();

// Válasz JSON formátumban
header('Content-Type: application/json');
echo json_encode($response);
?>
