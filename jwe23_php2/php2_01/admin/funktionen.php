<?php

session_start();
// interne Funktion - generiert eindeutige Session-ID (immer andere)
// ist auch notwendig, um die $_SESSION zur verfügung zu haben

$db = mysqli_connect("localhost", "root", "", "php2_2023");
// interne Funktion - Verbindung zum Server herstellen
// Bis zu 4 Parameter - Hostname, Benutzername, Kennwort, Datenbankname ("z.B.: localhost", "root",…)

mysqli_set_charset($db, "utf8");
// interne Funktion - mysql mitteilen, dass unsere Befehle als utf8 kommen

function query($sql_befehl) // Eigenfunktion!!!!!!
{
    global $db;
    $result = mysqli_query($db, $sql_befehl) or die(mysqli_error($db) . "<br>" . $sql_befehl); // "die" beendet das Programm bei Fehler
    return $result;
    // ACHTUNG $result als Variable angeben
}

function escape($post_var) // Eigenfunktion!!!!!
{
    global $db; // Holt Variable von Draußen rein
    return mysqli_real_escape_string($db, $post_var);
    // IMMER mit mysqli_real_escape_string - Maskiert Sonderzeichen - behandeln!!!!!!!!
}


// Diese funktion überprüft, ob der Benutzer eingeloggt ist
// Falls nicht, wird er automatisch zum Login umgeleitet
function ist_eingeloggt() //Eigenfunktion!!!!!!!!!
{
    if (empty($_SESSION["eingeloggt"])) {
        //Benutzer ist NICHT eingeloggt -> umleiten zum Login
        header("Location: login.php"); // "header" interne Funktion - Weiterleitung zu "login.php" (verwirrender Name!)
        exit; // wird gemacht, um weitere "geheime" Inhalte darunter nicht zum Browser schicken
    }
}
