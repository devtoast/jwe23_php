<!DOCTYPE html>
<html lang="de">
<head>
    <title>Eigene Funktionen</title>
</head>

<h1>Eigene Funktionen</h1>

<?php  
// Funktion zum Umrechnen von °C in °F
// °F = °C * 1.8 + 32

function celsius_in_farenheit($c) {
    $farenheit = $c * 1.8 + 32;
    return $farenheit;
}

echo celsius_in_farenheit(30);
echo "<br>";

$c = 15;
$f = $c * 1.8 + 32;
echo $f;
echo "<br>";


echo celsius_in_farenheit(50);
echo "<br>";
echo celsius_in_farenheit(60);
echo "<br>";

// Datum neu formatieren

$datum_mysql = "2022-04-17"; 
// Ausgabe soll sein 17.04.22

function de_datum($datum_falsch){
    $year = substr($datum_falsch, 2, 2); // startet bie 0!!!!!!!
    $month = substr($datum_falsch, 5, 2); // startet bie 0!!!!!!!
    $day = substr($datum_falsch, 8, 2); // startet bie 0!!!!!!!
    return $day . "." . $month . "." . $year;
}
echo de_datum($datum_mysql);

?>

<body>
    
</body>
</html>