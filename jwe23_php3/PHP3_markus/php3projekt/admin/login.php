<?php
include "setup.php";

use WIFI\Fdb\Validieren;
use WIFI\Fdb\Mysql;

if (!empty($_POST)) {
    // Validieren
    $validieren = new Validieren();
    $validieren->istAusgefuellt($_POST["benutzername"], "Benutzer");
    $validieren->istAusgefuellt($_POST["passwort"], "Passwort");

    if (!$validieren->fehlerAufgetreten()) {
        // weiter machen mit einloggen
        $db = Mysql::getInstanz();
        $sqlBenutzer = $db->escape($_POST["benutzername"]);

        $result = $db->query("SELECT * FROM benutzer WHERE benutzername='{$sqlBenutzer}'");
        $benutzer = $result->fetch_assoc();

        if (empty($benutzer) || !password_verify( $_POST["passwort"], $benutzer["passwort"] )) {
            // Fehler: Benutzer existiert nicht.
            $validieren->fehlerHinzu("Benuzter oder Passwort war falsch.");
        } else {
            // Alles ok -> Login in Session merken
            $_SESSION["eingeloggt"] = true;
            $_SESSION["benutzername"] = $benutzer["benutzername"];
            $_SESSION["benutzer_id"] = $benutzer["id"];

            //Umleitung zum Admin-System
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
    <title>Administration Fahrzeug-DB</title>
</head>
<body>
    <h1>Administration Fahrzeug-DB</h1>
<?php
    // Fehlermeldungen ausgeben, wenn aufgetreten
    if (!empty($validieren)) {
        echo $validieren->fehlerHtml();
    }
?>
    <form method="post">
    <div>
        <label for="benutzername">Benutzername:</label>
        <input type="text" name="benutzername" id="benutzername" >
    </div>
    <div>
        <label for="passwort">Passwort:</label>
        <input type="password" name="passwort" id="passwort" >
    </div>
    <div>
        <button type="submit">Einloggen</button>
    </div>
    </form> 
</body>
</html>