<?php
include "funktionen.php";

// if (!empty($_POST)) - wenn noch nichts abgeschickt wurde bzw. noch nicht auf den Button geklickt wurde
if (!empty($_POST)) {
    // Validierung
    if (empty($_POST["benutzername"]) || empty($_POST["passwort"])) {
        $error = "Benutzername oder Passwort war leer!";
    } else {
        // Benutzer und Passwort werden übergeben
        // => in der DB nachsehen, ob der Benutzer existiert

        // Daten von Formularen/Benutzern ($_GET / $_POST)
        // IMMER mit mysqli_real_escape_string - Maskiert Sonderzeichen - behandeln!!!!!!!!
        // bevor die Daten in einem Datenbankbefehl verwendet werden
        $sql_benutzername = escape($_POST["benutzername"]); // Funktion escape kommt aus funktionen.php


        // Ausgabe zum Verständnis //
        // echo "SELECT * FROM benutzer WHERE benutzername=\"{$_POST["benutzername"]}\"";
        // echo "<br>";
        //  var_dump($sql_benutzername);


        // Datenbank fragen ob der eingegebene Benutzer existiert.  // Funktion query kommt aus Datei Funktionen
        $result = query("SELECT * FROM benutzer WHERE benutzername='{$sql_benutzername}'");

        // Einen Datensatz aus mysql in ein PHP Array umwandeln
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            // var_dump($row);
            // Benutzername existiert => Passwort prüfen
            // Die Funktion var_dump() gibt Informationen über eine oder mehrere Variablen aus.

            //https://www.php.net/manual/de/function.password-verify
            // if ($_POST["passwort"] == $row["passwort"]) {
            //Alles super -> login - MERKEN
            if (password_verify($_POST["passwort"], $row["passwort"])) {
                // password_verify vergleicht das generierte Zeichenkette PW mit dem KLARNAMEN PW "lisa123"
                $_SESSION["eingeloggt"] = true;
                $_SESSION["benutzername"] = $row["benutzername"]; // Zur Ausgabe in kopf.php


                // letztes Login & Anzahl der Logins in DB speichern
                query("UPDATE `benutzer` SET `letztes_login`=NOW(),`anzahl_logins`=anzahl_logins+1 WHERE benutzername = '{$row['benutzername']}'");
                //NOW()=SQL-Funktion


                //Umleiten zum Admin-System
                header("Location: index.php");
                exit;
            } else {
                //Passwort war falsch -> Fehlermeldung
                //idealerweise die selbe Fehlermeldung, somit kannman nicht darauf scchließen was von beiden (PW od. Benutzer) falsch war
                $error = "Benutzername oder Passwort war falsch";
            }
        } else {
            // eingegebener Benutzer ist nicht in der DB => Fehlermeldung
            //idealerweise die selbe Fehlermeldung, somit kannman nicht darauf scchließen was von beiden (PW od. Benutzer) falsch war
            $error = "Benutzername oder Passwort war falsch";
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
    <title>Loginbereich zur Rezepteverwaltung</title>
</head>

<body>

    <h1>Loginbereich zur Rezepteverwaltung</h1>

    <?php
    // Ausgabe des oberen PHP-Codes (5 - 8)
    if (!empty($error)) {
        echo "<p>{$error}</p>";
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