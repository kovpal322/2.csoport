<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anime_id = $_POST['anime_id'];
    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "anime_database";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
    }

    // SQL lekérdezés a komment hozzáadásához
    $query = "INSERT INTO anime_comments (anime_id, user_id, comment) VALUES ('$anime_id', '$user_id', '$comment')";
    $result = $conn->query($query);

    if ($result) {
        // Sikeres komment hozzáadás esetén visszaadjuk az új komment adatait JSON formátumban
        $timestamp = date("Y-m-d H:i:s");

        // Lekérjük a felhasználónevet a user_id alapján
        $user_query = "SELECT username FROM users WHERE user_id = '$user_id'";
        $user_result = $conn->query($user_query);
        $user_row = $user_result->fetch_assoc();
        $username = $user_row['username'];

        $new_comment = array(
            'username' => $username,
            'comment' => $comment,
            'timestamp' => $timestamp
        );
        echo json_encode($new_comment);
    } else {
        // Hiba esetén üres JSON választ küldünk
        echo json_encode(array());
    }

    $conn->close();
} else {
    // Ha nem POST kérés érkezett, üres JSON választ küldünk
    echo json_encode(array());
}
?>
