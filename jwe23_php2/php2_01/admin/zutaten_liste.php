<?php
include "funktionen.php";

ist_eingeloggt(); // Ist der Benutzer überhaupt eingeloggt bzw. muss eingeloggt sein

include "kopf.php";
?>

<h1>Zutaten</h1>

<p><a href="zutaten_neu.php">Neue Zutaten anlegen</a></p>

<?php
$result = query("SELECT * FROM zutaten ORDER BY titel ASC"); // Eigenfunktion aus funktionen

echo "<table border ='1'>";

echo "<thead>";
echo "<th>Id</th>";
echo "<th>Titel</th>";
echo "<th>kCal</th>";
echo "<th>Optionen</th>";
echo "</thead>";

echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";

    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["titel"] . "</td>";
    echo "<td>" . $row["kcal_pro_100"] . "</td>";
    echo "<td>" . "<a href='zutaten_bearbeiten.php?id={$row["id"]}'>Bearbeiten</a>" . "</td>";

    echo "</tr>";
}

echo "</tbody>";

echo "</table>";

include "fuss.php";
