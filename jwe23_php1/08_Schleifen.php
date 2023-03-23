<!DOCTYPE html>
<html lang="de">

<head>

    <title>08_Schleifen</title>
</head>

<body>

    <h1>08_Schleifen</h1>

    <?php
    // limitierte Ausführungszeit auf 1 Sek. - Vorteil: Bricht bei Endlosschleife ab
    set_time_limit(1);

    // WHILE-SCHLEIFE   1-10 ausgeben mit einer While Schleife
    $zahl = 1;
    while ($zahl <= 10) {
        echo $zahl++ . " ";
    }

    echo "<br>";

    // DO WHILE-SCHLEIFE

    // FOR EACH-SCHLEIFE - Gut für Arrays
    // Array der -reihe nach ausgeben mit foreach

    $staedte = array(
        "Bregenz", "Innsbruck", "Salzburg", "Linz", "St. Pölten",
        "Wien", "Eisenstadt", "Graz", "Klagenfurt"
    );

    asort($staedte); // Sortierung VOR Schleife sontst machts keinen Sinn

    foreach ($staedte as $index => $stadt) {
        echo $index . ". ";
        echo ($stadt);
        echo "<br>";
    }

    echo "<br>";

    //

    $nav_punkte = array(
        "home" => "Startseite", // Assoziatives Array – Index ist "home"
        "kontakt" => "Kontakt",
        "leistungen" => "Leistungen",
        "oeffnungszeiten" => "Öffnungszeiten",
    );

    foreach ($nav_punkte as $href => $nav_punkt) {
        echo $href . ". ";
        echo ($nav_punkt);
        echo "<br>";
    }

    echo "<br>";



    ?>

</body>


</html>