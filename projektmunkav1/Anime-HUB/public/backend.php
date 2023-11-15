<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "anime_database"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}


$sql = "SELECT * FROM animes";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);

$conn->close();
?>
