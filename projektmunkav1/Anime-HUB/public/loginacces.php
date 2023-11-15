<?php
session_start();
// Felhasználó bejelentkezése

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrzés az adatbázisban
    $db_host = "localhost";
    $db_username = "root"; // Az adatbázis felhasználóneved
    $db_password = ""; // Az adatbázis jelszavad
    $db_name = "anime_database"; // Az adatbázis neve

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    // Ellenőrizzük a kapcsolatot
    if ($conn->connect_error) {
        die("Sikertelen kapcsolódás az adatbázishoz: " . $conn->connect_error);
    }

    // Felhasználó által megadott adatok
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stayLoggedIn = isset($_POST['stayLoggedIn']);

    // Ellenőrzés az adatbázisban
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Sikeres bejelentkezés
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row["user_id"];

        // Beállítjuk a sütit
        if ($stayLoggedIn) {
            setcookie('user_id', $_SESSION['user_id'], time() + (86400 * 30), "/"); // 30 napig érvényes süti
        }

        // Átirányítás a sikeres bejelentkezési oldalra
        header("Location: /");
        exit();
    } else {
        // Sikertelen bejelentkezés
        // További műveletek, például hibaüzenet megjelenítése
        echo "Sikertelen bejelentkezés. Kérlek, próbáld újra!";
    }

    $conn->close();
}
?>
