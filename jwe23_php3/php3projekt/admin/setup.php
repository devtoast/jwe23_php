<?php

// Konfiguration für das Projekt

const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORT = "";
const MYSQL_DATENBANK = "php3";


// Setup-Code: Nur verändern wenn du weißt was du tust

session_start();

spl_autoload_register(
    function (string $klasse) {
        // Projektspezifisches namespace prefix
        $prefix = "WIFI\\Fdb\\";

        //Basisverzeichnis für das namespace prefix
        $basis = __DIR__ . "/Fdb/"; // __DIR__ = ist GLEICHER ORDNER in der setup.php liegt -"/Fdb/" = UNTERORDNER

        // Wenn die Klasse das prefix nicht verwendet - abbrechen!
        $laenge = strlen($prefix);
        if (substr($klasse, 0, $laenge) !== $prefix) {
            return;
        }

        // Klasse ohne Prefix
        $relativ = substr($klasse, $laenge); // 3. Argument - die übriggebliebenen Zeichen braucht man nicht angeben() 

        // Dateipfad erstellen
        $datei = $basis . str_replace("\\", "/", $relativ) . ".php";

        // Wenn die Datei existiert - einbinden!
        if (file_exists($datei)) {
            include $datei;
        }
    }
);

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
// Benutzer nicht eingeloggt umleiten zu Login
