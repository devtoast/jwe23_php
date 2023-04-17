<?php

include "kopf.php";
include "funktionen.php"

?>


<h1 style="margin-left: 1%">Passagierliste</h1>


<?php
// $result = query("SELECT passagier.*, benutzer.benutzername FROM rezepte JOIN benutzer ON rezepte.benutzer_id = benutzer.id ORDER BY rezepte.titel ASC");
$result = query("SELECT * FROM passagiere JOIN fluege ON passagiere.flug_id = fluege.id ORDER BY passagiere.nachname ASC");
// Selektiert jetzt ALLES aus beiden Tabellen


echo "<table style='border: 0; margin-left: 1%; width: 100%; text-align: left'>";

echo "<thead>";

echo "<th>Passagier_ID</th>";
echo "<th>Vorname</th>";
echo "<th>Nachname</th>";
echo "<th>Geburtsdatum</th>";
echo "<th>Flugangst</th>";

echo "<th>Flug_ID</th>";
echo "<th>Flugnummer</th>";
echo "<th>Abflug</th>";
echo "<th>Ankunft</th>";
echo "<th>Startflughafen</th>";
echo "<th>Zielflughafen</th>";

echo "</thead>";


echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    // $row – alle Datensätze aus Tabelle "passagiere" UND "(JOIN "fluege")"- Reihe für Reihe (mit while-Schleife)
    // $result – Zeile 53 (kombo mit funktion(query)) (sql_befehl = mysqli_fetch_assoc?) - in assoc. ARRAY
    echo "<tr>";

    // Kommt aus "passagiere"
    echo "<td>" . $row["passagier_id"] . "</td>";
    echo "<td>" . $row["vorname"] . "</td>";
    echo "<td>" . $row["nachname"] . "</td>";
    echo "<td>" . $row["geburtsdatum"] . "</td>";
    echo "<td>" . $row["flugangst"] . "</td>";
    echo "<td>" . $row["flug_id"] . "</td>";
    // Kommt aus "fluege"
    echo "<td>" . $row["flugnr"] . "</td>";
    echo "<td>" . $row["abflug"] . "</td>";
    echo "<td>" . $row["ankunft"] . "</td>";
    echo "<td>" . $row["start_flgh"] . "</td>";
    echo "<td>" . $row["ziel_flgh"] . "</td>";

    // ACHTUNG übergibt die PASSAGIER_ID für die Seite "Passagier bearbeiten" 
    // um dort mit Methode $_GET weiterverarbeitet zu werden (passagier löschen & passagier bearbeiten)
    echo "<td>" . "<a href='passagier_bearbeiten.php?passagier_id={$row["passagier_id"]}'>Bearbeiten</a>" . "</td>";
    // WICHTIG

    // LÖSCH-FUNKTION "Passagier löschen"
    echo "<td>" . "<a href='passagier_loeschen.php?passagier_id={$row["passagier_id"]}'; style='color: red'>Löschen</a>" . "</td>";

    echo "</tr>";
}
echo "</tbody>";








echo "</table>";


echo "<br>";
echo "<br>";

?>



<?php
include "fuss.php";
?>