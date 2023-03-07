<!DOCTYPE html>
<html lang="de">

<head>
    <title>07_Eigene Funktionen</title>
</head>

<h1>Eigene Funktionen</h1>

<?php
// Funktion zum Umrechnen von °C in °F
// °F = °C * 1.8 + 32

function celsius_in_farenheit($c, $b = null)
{
    $farenheit = $c * 1.8 + 32;
    echo $b;
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

function de_datum($datum_falsch)
{
    $year = substr($datum_falsch, 2, 2); // startet bie 0!!!!!!!
    $month = substr($datum_falsch, 5, 2); // startet bie 0!!!!!!!
    $day = substr($datum_falsch, 8, 2); // startet bie 0!!!!!!!
    return $day . "." . $month . "." . $year;
}
echo de_datum($datum_mysql);
echo "<br>";

//echo date("d"."m"."Y");
//echo "<br>";

echo date("d.m.y", strtotime($datum_mysql));
echo "<br>";


//Datum formatieren: 2. Variante
// Ausgabe soll sein 17.04.2022
function de_datum2($datum_falsch)
{
    //explode
    $teile = explode("-", $datum_falsch);
    return $teile[2] . "." . $teile[1] . "." . $teile[0];

    //return "$day.$month.$year";
}

echo de_datum2($datum_mysql);


echo "<br>";

$datum_mysql = explode("-", $datum_mysql,);
//
echo "<pre>";
print_r($datum_mysql);
echo "</pre>";
//

echo "<br>";


// Text nach 10 Zeichen abschneiden und "..." anhängen
function text_abschneiden($text_lang)
{

    $text_length = strlen($text_lang);

    if ($text_length >= 10) {
        return "{$text_lang}...";
    } else if ($text_length <= 10) {
        return "{$text_lang}";
    } else {
    }

    //return "";
}

$text = "123456789011111";
echo text_abschneiden($text);
echo "<br>";

echo "<br>";


// Text nach 10 Zeichen abschneiden und "..." anhängen
function text_abschneiden2($text_lang)
{

    $text_length = mb_strlen($text_lang);
    echo $text_length;
    echo "<br>";

    if ($text_length >= 10) {
        return substr($text_lang, 0, 10) . "...";
    } else {
        return "{$text_lang}";
    }

    //return "";
}

$text2 = "123456755555555";
echo text_abschneiden2($text2);
echo "<br>";


// Text nach 10 Zeichen abschneiden und "..." anhängen
function text_abschneiden3($text_lang, $laenge = 10) // 2ter Parameter Default Value = 10 - kann dann später geändert werden ($text3, 5)
{

    $text_length = mb_strlen($text_lang);
    echo $text_length;
    echo "<br>";

    if ($text_length > $laenge) {
        return substr($text_lang, 0, $laenge) . "...";
    } else {
        return $text_lang;
    }
}

$text3 = "123456";
echo text_abschneiden3($text3, 5);
echo "<br>";



?>

<body>

</body>

</html>