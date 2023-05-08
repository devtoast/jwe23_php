<?php
include "funktionen.php";
include "kopf.php";
?>
<h1 style="margin-left: 1%">Alle Flüge</h1>

<?php

$result = query("SELECT * FROM fluege /*WHERE abflug >= NOW()*/ ORDER BY abflug ASC");
//WHERE abflug >= NOW()

echo "<table style='border: 0; margin-left: 1%; width: 100%; text-align: left'>";


echo "<thead>";

echo "<th>Flugnummer</th>";
echo "<th>Abflug</th>";
echo "<th>Ankunft</th>";
echo "<th>Startflughafen</th>";
echo "<th>Zielflughafen</th>";

echo "</thead>";

echo "<tbody>";

while ($row = mysqli_fetch_assoc($result)) {
  // $row – alle Datensätze aus Tabelle "fluege" - Reihe für Reihe (mit while-Schleife)
  // $result – (kombo mit funktion(query)) (sql_befehl = mysqli_fetch_assoc?) - in assoc. ARRAY
  echo "<tr>";

  echo "<td>" . $row["flugnr"] . "</td>";
  echo "<td>" . $row["abflug"] . "</td>";
  echo "<td>" . $row["ankunft"] . "</td>";
  echo "<td>" . $row["start_flgh"] . "</td>";
  echo "<td>" . $row["ziel_flgh"] . "</td>";

  echo "</tr>";
}
echo "</tbody>";




echo "</table>";

echo "<br>";
echo "<br>";

?>
<!--
<div class='row font-weight-bold border-bottom text-center'>
  <div class='col-2'>Flugnummer</div>
  <div class='col-3'>Abflug</div>
  <div class='col-3'>Ankunft</div>
  <div class='col-2'>Startflughafen</div>
  <div class='col-2'>Zielflughafen</div>
</div>

<div class='row text-center'>
  <div class='col-2'>XY 123</div>
  <div class='col-3'>12.02.2000, 12:34</div>
  <div class='col-3'>12.02.2000, 13:34</div>
  <div class='col-2'>SZG</div>
  <div class='col-2'>VIE</div>
</div>
<div class='row text-center'>
  <div class='col-2'>AB 456</div>
  <div class='col-3'>25.11.2044, 12:34</div>
  <div class='col-3'>26.11.2045, 11:34</div>
  <div class='col-2'>ABC</div>
  <div class='col-2'>XYZ</div>
</div>
<div class='row text-center'>
  <div class='col-2'>AZ 789</div>
  <div class='col-3'>11.02.2033, 05:05</div>
  <div class='col-3'>12.02.2033, 06:06</div>
  <div class='col-2'>OPQ</div>
  <div class='col-2'>RST</div>
</div>
-->

<?php
include "fuss.php";
?>