<!DOCTYPE html>
<html lang="de">

<head>

    <title>06_Funktionen für Arrays</title>
</head>

<body>

    <h1>Funktionen für Arrays</h1>

    <?php

    $namen = array("Peter", "Franziska", "Klaus", "Olav", "Klaus", "Max");

    // Elemente (Werte)in einem Array zählen
    echo count($namen);
    echo "<br>";



    // Zufälligen Namen (Arrayposition 0, 1...) ausgeben
    echo array_rand($namen);
    echo "<br>";
    $randomArrayIndex = array_rand($namen); // zufällige Position in einer Variblen speichern "$randomArrayIndex"
    echo $namen[$randomArrayIndex]; // mit Variablen "randomArrayIndex" namen aus Array ausgeben
    echo "<br>";

    // Doppelte Werte entfernen - array_unique - ACHTUNG auf Index! Der gelöschte fehlt!
    $eindeutig = array_unique($namen);
    echo count($eindeutig);
    echo "<br>";

    // ACHTUNG auf Index
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    //
    echo "<br>";



    // Prüfen ob ein wert in einem Array existiert - in array
    echo ">" . in_array("Heidi", $namen) . "<";
    echo "<br>";
    echo in_array("Peter", $namen);
    echo "<br>";

    /*
$nameContent = in_array(1, $namen);

if ($nameContent == 1) 
{
echo "Dieser Name existiert";
}

else 
{
echo "Dieser Name existiert nicht";
}
*/

    $i = in_array("Franziska", $namen);

    if ($i) {
        echo "Dieser Name existiert";
    } else {
        echo "dieser Name existiert nicht";
    }
    echo "<br>";



    // Aufsteigend nach Namen sortieren (A - Z) - asort
    asort($eindeutig);

    //
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    //
    echo "<br>";



    // Wert im Nachhinein hinzufügen - array_push
    $eindeutig[] = "Hubert"; // 1. Variante

    array_push($eindeutig, "Julia", "Fritz"); // 2. Variante - VORTEIL man kann mehr als einen Wert hinzufügen

    //
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    //
    echo "<br>";



    // Sortieren und Indizes neu zuweisen - sort (= Gegenteil von asort)
    sort($eindeutig);

    //
    echo "<pre>";
    print_r($eindeutig);
    echo "</pre>";
    //
    echo "<br>";


    // 





    ?>

</body>

</html>