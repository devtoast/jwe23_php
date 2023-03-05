<!DOCTYPE html>
<html lang="de">

<head>
    <title>010_regex</title>
</head>

<body>

    <h1>010 Reguläre Ausdrücke in PHP</h1>

    <?php

    // Benutzername auf gültige Zeichen prüfen
    // diese dürfen nur a-z 0-9 beinhalten

    $benutzer = "mustermann9";

    // preg_match 1. Parameter (was/wie wird geprüft) - 2. Parameter was wird geprüft (welche Variable/Wert)
    // ^ ...Start of string
    // $ ... End of 

    if (preg_match("/^[0-9a-z]+$/", $benutzer)) {

        echo "Benutzer ist zulässig";

    }
    else {
        echo "Benutzer ist nicht zulässig";
    }

    // https://regex-generator.olafneumann.org



    ?>

</body>

</html>