<?php

// Klassendefinition einbinden
include "Person.php";

// Objekt erzeugen aus der Klasse "Person"
// Instanzieren / Instanz herstellen
$ich = new Person("Markus");
echo $ich->get_vorname();
echo $ich->vorstellen();

echo "<br>";

$ich->set_vorname("Lisa");
echo $ich->get_vorname();

echo "<br>";

// Weiteres Objekt erstellen

$sie = new Person("Sabrina");
echo $sie->vorstellen();
echo "<br>";
