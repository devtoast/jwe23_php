<!DOCTYPE html>
<html lang="de">
<head>
    <title>Variablen mit PHP</title>
</head>

<body>

<?php 
// Ganzzahl (integer) definieren
$alter = 45;
echo "Ich bin ";
echo $alter;


echo "<br>"; // br wird in html übergeben


// Kommazahl (float) definieren und ausgeben
$kontostand = 5698.5;
echo $kontostand;


echo "<br>";


// Text (string) einer Variablen zuweisen und ausgeben
$name = "Peter";

// Ich heisse Peter
echo "Ich heiße "; echo $name;
echo "<br>";
echo "Ich heiße $name";
echo "<br>";
echo 'Ich heiße $name'; // Keine Hochkomma
echo "<br>";
echo "Ich heiße " . $name;
echo "<br>";

// Ich habe Peters Stift.
echo "Ich habe $name";  echo "s Stift.";
echo "<br>";
echo "Ich habe {$name}s Stift."; // Variablenname in geschwungener Klammer definiert die Variable
echo "<br>";


//Dateentyp: Boolean (kurz: Bool)
$wahr = true;
echo $wahr;
echo "<br>";
$true = true;
echo $true;
echo "<br>";

$false = false;
echo $false; // false ist leer in PHP
echo ">".$false."<";
echo "<br>";


//null: "nichts" oder "undefiend"
$nichts = null;
echo ">".$nichts."<";
echo "<br>";


// Eine Konstante definieren und verwenden
define("datenbank", "jwe22");
echo datenbank;
echo "<br>";
// Neue Schreibweise !!
const datenbank2 = "jwe20";
echo datenbank2;
echo "<br>";



?>

    
</body>

</html>