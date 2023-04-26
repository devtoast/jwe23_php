<?php
echo "<h3>Statische Eigenschaften und Methoden</h3>";

include "Statisch.php";

$neu = new Statisch();
$neu2 = new Statisch();
$neu3 = new Statisch();
echo Statisch::$aufrufe;
echo "<br>";

Statisch::setze_0();
echo Statisch::$aufrufe;
