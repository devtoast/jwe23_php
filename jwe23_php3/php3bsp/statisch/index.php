<?php

include "Statisch.php";

echo "<h3>Statische Eigenschaften und Methoden</h3>";

$neu = new Statisch();
$neu2 = new Statisch();
$neu3 = new Statisch();

echo Statisch::$aufrufe;

echo "<br>";

Statisch::setze_0();
echo Statisch::$aufrufe;

echo "<br>";
