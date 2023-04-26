<?php
ini_set("error_reporting", E_ALL);

echo "<h3>Magische Methoden</h3>";

include "Magic.php";

$m = new Magic();

// Magic method: __set()
$m->vorname = "Maria";
$m->nachname = "Hauser";

// Magic method: __get()
echo $m->nachname;
echo "<br>";

// Magic method: __call()
$m->speichern("benutzer", "insert", 5);

// Magic methed: __toString()
echo $m;
