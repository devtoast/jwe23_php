<?php

// Konfiguration für das Projekt
const MYSQL_HOST = "localhost";
const MYSQL_USER = "root";
const MYSQL_PASSWORT = "";
const MYSQL_DATENBANK = "php3_markus";

// Setup-Code: Nur verändern wenn du weißt, was du tust.
session_start();

spl_autoload_register(
    function (string $klasse) {
        // Projekt-spezifisches namespace prefix
        $prefix = "WIFI\\Fdb\\";

        // Basisverzeichnis für das namespace prefix
        $basis = __DIR__ . "/Fdb/";

        // Wenn die Klasse das prefix nicht verwendet, abbrechen
        $laenge = strlen($prefix);
        if (substr($klasse, 0, $laenge) !== $prefix) {
            return;
        }

        // Klasse ohne Prefix
        $relativ = substr($klasse, $laenge);

        // Dateipfad erstellen
        $datei = $basis . str_replace("\\", "/", $relativ) . ".php";

        // Wenn die Datei existiert, einbinden.
        if (file_exists($datei)) {
            include $datei;
        }
    }
);

function ist_eingeloggt()
{
    if (empty($_SESSION["eingeloggt"])) {
        // benutzer nicht eingeloggt -> umleiten zu login
        header("Location: login.php");
        exit;
    }
}
