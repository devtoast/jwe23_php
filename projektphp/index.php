<?php

if ( empty($_GET["seite"])) { // seite ist nur Bezeichnung für URL-Bezeichnung im Browser 
    $seite = "home";
}
else {
    $seite = $_GET["seite"];

}

if ( $seite == "home") {
    $include_datei = "home.php";
    $seitentitel = "Friseur Haarekurz";
    $meta_description = "Haareschneiden";
}

elseif ( $seite == "leistungen") {
    $include_datei = "leistungen.php";
    $seitentitel = "Günstiger Preis";
    $meta_description = "Billig";
}

elseif ( $seite == "oeffnungszeiten") {
    $include_datei = "oeffnungszeiten.php";
    $seitentitel = "Immer für Sie da";
    $meta_description = "Immer da";
}

elseif ( $seite == "kontakt") {
    $include_datei = "kontakt.php";
    $seitentitel = "Fragen Sie uns";
    $meta_description = "Sie fragen wir antworten";
}

else {
    $include_datei = "error404.php"; //404
    $seitentitel = "Seite nicht gefunden";
    $meta_description = "404";

}

// $seite = "leistungen"; - nur zum probieren

include "kopf.php";
//include "inhalt/index.php";
include "inhalt/" . $include_datei;  // Holt die passende Datei aus dem Ordner "Inhalt"

//include "inhalt/leistungen.php";
//include "inhalt/oefnungszeiten.php";

include "fuss.php";

?>