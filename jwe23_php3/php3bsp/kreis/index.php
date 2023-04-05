<?php

echo "<h3>Kreis</h3>";

include "Kreis.php";

$k = new Kreis(3);

echo "Fläche: " . $k->flaeche();

echo "<br>";

echo "Durchmesser: " . $k->durchmesser();

echo "<br>";

echo "Umfang: " . $k->umfang();

echo "<br>";
echo "<br>";

$k->set_radius(5);
echo "Durchmesser NEU: " . $k->durchmesser();

echo "<br>";
echo "<br>";

$benutzer_eingabe = -2;
// Wird in einem try-Block eine Exeption geworfen
// hat man im "catch" die Möglichkeit darauf zu reagieren
try {
    $k->set_radius($benutzer_eingabe);
    echo "Durchmesser zum Schluss: " . $k->durchmesser();
    echo "<br>";
} catch (Exception $ex) {
    // Fängt alle Exeption-Objekte ab die im try-Block
    // geworfen wurden: throw new Exeption("...")
    echo "Da war was falsch: " . $ex->getMessage();
    echo "<br>";
} finally {
    // Dieser Code wird in jedem Fall ausgeführt
    echo "Das wars wohl.<br />";
}

echo "<br>";

// unset - löscht die Variable $k
unset($k);

echo "Letzte Ausgabe<br>";
