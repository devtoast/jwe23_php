<?php
ini_set("error_reporting", E_ALL);
include "Magic.php";

echo "<h3>Magische Methoden</h3>";

$m = new Magic();

// Magic method: __set()
$m->vorname = "Thomas";
$m->nachname = "Astleithner";

echo "<pre>";
print_r($m);
echo "<br>";

// Magic method: __get()
echo $m->vorname;
echo "<br>";
echo $m->nachname;
echo "<br>";
echo "<br>";

// Magic method: __call()
$m->speichern("benutzer", "insert", 5);
echo "<br>";
echo "<br>";

// Magic method: __toString()
echo $m;
