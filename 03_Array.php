<!DOCTYPE html>
<html lang="de">

<head>
    <title>03_Arrays in PHP</title>
</head>

<body>
    <h1>Arrays in PHP</h1>

    <?php

    // Numerische Arrays definieren (Index ist ein Nummer)

    $namen = array("Thomas", "Max", "Moritz", "Peter");
    // Thomas und Moritz
    echo $namen[2] . " und " . $namen[0];
    echo "<br>";
    echo "{$namen[2]} und {$namen[0]}"; // Alternative Schreibweise
    echo "<br>";


    // Wert im Nachhinein an Array anhängen
    $namen[] = "Mario";

    echo "<pre>";
    print_r($namen);
    echo "</pre>";


    // Index als Variable
    $x = 3;
    echo $namen[$x + 1];
    echo "<br>";


    // Assoziative Arrays definieren (Index ist ein Text)

    $personen = array(
        "name" => "Markus",
        "alter" => 63,
        "ort" => "Salzburg"
    );

    // Ausgabe: Markus (63) aus Salzburg
    echo $personen["name"] . " (" . $personen["alter"] . ") aus " . $personen["ort"];
    echo "<br>";
    echo "{$personen["name"]} {$personen["alter"]} aus {$personen["ort"]}";
    echo "<br>";

    // Im Nachhinen einen Wert im Array anfügen
    $personen["guthaben"] = 180;

    // Inhatlt aus Array darstellen (nur zu Debugging-Zwecke!!!)
    echo "<pre>";
    print_r($personen);
    echo "</pre>";
    //

    echo "<br>";

    // Mehrdimensionale Arrays (verschachtelt - Arrays in Array)
    $personenliste = array(
        array(
            "name" => "Herbert",
            "alter" => 33,
            "ort" => "Linz"
        ),
        array(
            "name" => "Sarah",
            "alter" => 12,
        ),
        $personen // Schon vorhandenes Array einfügen

    );
    // LINZ
    echo $personenliste[0]["ort"];
    echo "<br>";

    // LINZ und Sarah
    echo $personenliste[0]["ort"] . $personenliste[1]["name"];
    echo "<br>";




    // Inhatlt aus Array darstellen (nur zu Debugging-Zwecke!!!)
    echo "<pre>";
    print_r($personenliste);
    echo "</pre>";
    //

    // Ändern von Arraywerten
    $personenliste[0]["alter"] = 35;
    echo $personenliste[0]["alter"];
    echo "<br>";







    ?>

</body>

</html>