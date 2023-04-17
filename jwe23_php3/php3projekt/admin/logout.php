<?php

session_start();

// Alle $_SESSION Variablen löschen. - alles wird wieder geleert (z.B. für nächsten Benutzer)
// Setzt alles zurück
session_unset();

// Vernichtet die ganze Session samt Cookie
session_destroy();

?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout aus der Fahrzeug-DB</title>
</head>

<body>
    <h1>Logout aus der Fahrzeug-DB</h1>
    <p>Sie wurden erfolgreich ausgeloggt.</p>
    <p>
        <a href="login.php">Weiter zum Login</a>
    </p>

</body>

</html>