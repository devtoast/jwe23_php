<?php

use WIFI\Fdb\Model\Fahrzeuge;

include "setup.php";
ist_eingeloggt();

include "kopf.php";
?>
<h1>Fahrzeuge</h1>
<p><a href="fahrzeuge_bearbeiten.php">Neues Fahrzeug anlegen</a></p>
<?php


echo "<table border='1'>";
    echo "<thead>";
        echo "<th>Marke</th>";
        echo "<th>Modell</th>";
        echo "<th>Farbe</th>";
        echo "<th>Fahrzeug-Identifikations-Nr.</th>";
        echo "<th>Optionen</th>";
    echo "</thead>";
    echo "<tbody>";

    $fahrzeuge = new Fahrzeuge();
    $alleFahrzeuge = $fahrzeuge->alleFahrzeuge();

    foreach ($alleFahrzeuge as $auto) {
        echo "<tr>";
            echo "<td>" . $auto->marke()->hersteller . "</td>";
            echo "<td>" . $auto->modell . "</td>";
            echo "<td>" . $auto->farbe . "</td>";
            echo "<td>" . $auto->fin . "</td>";
            echo "<td>" . "<a href='fahrzeuge_bearbeiten.php?id={$auto->id}'>Bearbeiten</a>" . "<br>"
            ."<a href='fahrzeuge_entfernen.php?id={$auto->id}'>Entfernen</a>". "</td>";

        echo "</tr>";
    }
    echo "</tbody>";
echo "</table>";

include "fuss.php";