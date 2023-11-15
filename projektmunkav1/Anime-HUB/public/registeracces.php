<?php
session_start();
// Felhasználó regisztrációja

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
    $email = $_POST['email'];

    // Ellenőrzés az adatbázisban, például, hogy a felhasználónév vagy az e-mail cím még nem létezik
    $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // A felhasználónév vagy az e-mail cím már foglalt
        // További műveletek, például hibaüzenet megjelenítése
        echo "A megadott felhasználónév vagy e-mail cím már foglalt. Kérlek, válassz másikat!";
    } else {
        // Regisztráció az adatbázisban
        $insertQuery = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            // Sikeres regisztráció
            // Átirányítás a sikeres regisztrációs oldalra
            header("Location: index.php");
            exit();
        } else {
            // Sikertelen regisztráció
            // További műveletek, például hibaüzenet megjelenítése
            echo "Sikertelen regisztráció. Kérlek, próbáld újra!";
        }
    }

    $conn->close();
}
?>
