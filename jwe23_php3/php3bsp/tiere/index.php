<?php

/*
include "Tier/TierAbstract.php";
include "Tier/Hund.php";
include "Tier/Hund/Dogge.php";
include "Tier/Katze.php";
include "Tier/Maus.php";
*/


// Der Autoloader erhält Klassennnamen (mit namespace), die noch nicht includet wurden.
// Diesen Klassennamen können wir in einen Dateipfad umwandeln und die Datei danach einbinden.
// Wird für jede Klasse bei der ersten Verwendung automatisch aufgerufen.
spl_autoload_register(
    function (string $klasse) {
        // Projektspezifisches namespace prefix
        $prefix = "WIFI\\JWE\\";

        //Basisverzeichnis für das namespace prefix
        $basis = __DIR__ . "/";

        // Wenn die Klasse das prefix nicht verwendet - abbrechen!
        $laenge = strlen($prefix);
        if (substr($klasse, 0, $laenge) !== $prefix) {
            return;
        }

        // Klasse ohne Prefix
        $relativ = substr($klasse, $laenge); // 3. Argument - die übriggebliebenen Zeichen braucht man nicht angeben() 

        // Dateipfad erstellen
        $datei = $basis . str_replace("\\", "/", $relativ) . ".php";

        // Wenn die Datei existiert - einbinden!
        if (file_exists($datei)) {
            include $datei;
        }
    }
);

use WIFI\JWE\Tier\Hund;
use WIFI\JWE\Tier\Katze;
use WIFI\JWE\Tier\Maus;
use WIFI\JWE\Tier\Hund\Dogge;




echo "<h3>Tiere</h3>";

$hund = new Hund("Bello");
/*
// echo "<pre>", print_r($hund);

echo $hund->getName();

echo "<br>";

echo $hund->gibLaut();
*/
echo "<br> <br>";

$hund = new Dogge("Spike");

// echo "<pre>", print_r($hund);
/*
echo $hund->getName();

echo "<br>";

echo $hund->gibLaut();
*/
echo "<br>";
echo "<br>";

$katze = new Katze("Tom");
/*
echo $katze->getName();

echo "<br>";

echo $katze->gibLaut();
*/
echo "<br>";
echo "<br>";

$maus = new Maus("Jerry");

/*
echo $Maus->getName();

echo "<br>";

echo $Maus->gibLaut();
*/
echo "<br>";
echo "<br>";

use WIFI\JWE\Tier;
use WIFI\JWE\Tiere;

$tiere = new Tiere();
$tiere->add($hund);
$tiere->add($katze);
$tiere->add($maus);
$tiere->add(new Tier\Hund("Bello"));


echo $tiere->ausgabe();

// Iterator-Interface
foreach ($tiere as $tier) {
    echo "<br>";
    echo $tier->getName();
}
