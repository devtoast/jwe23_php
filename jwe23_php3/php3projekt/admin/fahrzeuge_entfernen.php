<?php

use WIFI\Fdb\Model\Row\Fahrzeug;

include "setup.php";
ist_eingeloggt(); // Ist der Benutzer überhaupt eingeloggt bzw. muss eingeloggt sein
include "kopf.php";

echo "<h1> Fahrzeuge entfernen</h1>";

$fahrzeug = new Fahrzeug($_GET["id"]);

if (!empty($_GET["doit"])) { // wird unten definiert!!!!!!! - Z29 !!!!!!!!!!
    //Bestätigungs-Link wurde geklickt -> wird aus DB gelöscht
    $fahrzeug->entfernen();

    echo "<p>Das Fahrzeug wurde erfolgreich entfernt</p>";
    echo "<a href='fahrzeuge_liste.php'>Zurück zur Liste</a>";
} else {

    // Benutzer fragen, ob er das Fahrzeug wirklich entfernen will
    echo "<h3>Sind Sie sicher, dass Sie dieses Fahrzeug entfernen möchten? </h3>";
    echo "<strong>Marke:</strong> " . $fahrzeug->marke()->hersteller . "<br />";
    echo "<strong>Marke:</strong> " . $fahrzeug->modell . "<br />";
    echo "<strong>Marke:</strong> " . $fahrzeug->farbe . "<br />";
    echo "<strong>Marke:</strong> " . $fahrzeug->fin . "<br />";
    echo "<p>
<a href='fahrzeuge_liste.php'> Nein,abbrechen</a>
<a href='fahrzeuge_entfernen.php?id=" . $fahrzeug->id . "&amp;doit=1'>Ja, sicher</a>
</p>"; // doit = WICHTIG für oben

}
?>


<?php
include "fuss.php";
