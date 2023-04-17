<?php
include "setup.php";

use WIFI\Fdb\Validieren;
use WIFI\Fdb\Mysql;

// if (!empty($_POST)) - wenn noch nichts abgeschickt wurde bzw. noch nicht auf den Button geklickt wurde
if (!empty($_POST)) {
    // Validieren
    $validieren = new Validieren();
    $validieren->istAusgefuellt($_POST["benutzername"], "Benutzer"); // "Benutzer" für Ausgabe Fehlermeldung (FehlerHTML/fehlerAufgetreten)
    $validieren->istAusgefuellt($_POST["passwort"], "Passwort");

    if (!$validieren->fehlerAufgetreten()) { // Wenn KEIN Fehler
        // Weitermachen mit einloggen
        $db = Mysql::getInstanz(); // Nur 1x Datenbankverbindung
        $sqlBenutzer = $db->escape($_POST["benutzername"]);

        $result = $db->query("SELECT * FROM benutzer WHERE benutzername='{$sqlBenutzer}'");
        $benutzer = $result->fetch_assoc();

        if (empty($benutzer) || !password_verify($_POST["passwort"], $benutzer["passwort"])) { // verify 1.Formulareingabe, 2. Benutzer von DB
            // password_verify vergleicht das generierte Zeichenkette PW mit dem KLARNAMEN PW "lisa123"
            // Fehler: Benutzer existiert nicht.
            $validieren->fehlerHinzu("Benutzer oder Passwort war falsch.");
        } else {
            // Alles ok -> alles in Session merken
            $_SESSION["eingeloggt"] = true;
            $_SESSION["benutzername"] = $benutzer["benutzername"]; // Zur Ausgabe in kopf.php
            $_SESSION["benutzer_id"] = $benutzer["id"];

            //Umleiten zum Admin-System
            header("Location: index.php");
            exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Fahrzeug-DB</title>
</head>

<body>

    <h1>Administration Fahrzeug-DB</h1>

    <?php
    // Fehlermeldung kommt nur wenn $validieren NICHT Leer ist
    if (!empty($validieren)) {
        //Fehlermeldungen ausgeben wenn aufgetreten
        echo $validieren->fehlerHtml();
    }
    ?>

    <form method="post">

        <div>
            <label for="benutzername">Benutzername:</label>
            <input type="text" name="benutzername" id="benutzername">
        </div>

        <div>
            <label for="passwort">Passwort:</label>
            <input type="text" name="passwort" id="passwort">
        </div>

        <div>
            <button type="submit">Einloggen</button>
        </div>

    </form>

</body>

</html>