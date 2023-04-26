<?php
use WIFI\Fdb\Model\Row\Fahrzeug;

include "setup.php";
ist_eingeloggt();

include "kopf.php";

echo "<h1>Fahrzeug entfernen</h1>";

$fahrzeug = new Fahrzeug($_GET["id"]);

if ( !empty( $_GET["doit"] ) ) {
    //Bestätigungs_link wurde geklickt -> wirkich aus der DB löschen
    $fahrzeug->entfernen();

    echo "<p>Das Fahrzeug wurde erfolgreich entfernt.<br>";
    echo "<a href='fahrzeuge_liste.php'>Zurück zur Liste</a></p>";
} else {

    //Benutzer fragen, ob er das Fahrzeug wirklich entfernen will

    echo "<h3>Sind Sie sicher, dass Sie dieses Fahrzeug entfernen möchen?</h3>";
    echo "<strong>Marke:</strong> ". $fahrzeug->marke()->hersteller ."<br />";
    echo "<strong>Modell:</strong> ". $fahrzeug->modell ."<br />";
    echo "<strong>Farbe:</strong> ". $fahrzeug->farbe ."<br />";
    echo "<strong>FIN:</strong> ". $fahrzeug->fin ."<br />";
    echo "<p>
        <a href='fahrzeuge_liste.php'>Nein, abbrechen</a>
        <a href='fahrzeuge_entfernen.php?id=". $fahrzeug->id ."&amp;doit=1'>Ja, sicher</a>
        </p>";

}
include "fuss.php";
