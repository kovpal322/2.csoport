<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználói adatok</title>
</head>
<body>

<h1>Felhasználói adatok</h1>
<p id="username">Felhasználónév: </p>
<p id="email">Email: </p>

<script>
// JavaScript kód az AJAX kéréshez
document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_user_data.php", true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var userData = JSON.parse(xhr.responseText);

            // A kapott adatok megjelenítése az oldalon
            document.getElementById("username").innerHTML += userData.username;
            document.getElementById("email").innerHTML += userData.email;
        }
    };

    xhr.send();
});
</script>

<!-- További adatokat megjelenítheted itt -->

</body>
</html>
