<?php
include "kopf.php";
include "funktionen.php";


$erfolg = false;

// Passagiere anlegen
if (!empty($_POST)) {

    $sql_vorname = escape($_POST["vorname"]);
    $sql_nachname = escape($_POST["nachname"]);
    $sql_geburtsdatum = escape($_POST["geburtsdatum"]);
    $sql_flugangst = escape($_POST["flugangst"]);

    // Flug hinzufügen
    $sql_flug_id = escape($_POST["flug"]);

    // var_dump($_POST);
    /*
    echo "<pre>";
    var_dump($sql_vorname);
    var_dump($sql_nachname);
    var_dump($sql_geburtsdatum);
    var_dump($sql_flugangst);
    var_dump($sql_flug_id);
    echo "</pre>";
*/

    query("INSERT INTO passagiere (vorname, nachname, geburtsdatum, flugangst, flug_id) VALUES ('{$sql_vorname}','{$sql_nachname}','{$sql_geburtsdatum}','{$sql_flugangst}','{$sql_flug_id}')");

    $erfolg = true;
}

?>

<h1>Passagiere anlegen</h1>


<form class="formular" method="post">

    <div>
        <label for="vorname">Vorname:</label>
        <input type="text" name="vorname" id="vorname" value="">
    </div>
    <!-- value=" -> zuletzt eingegebener Wert bleibt stehen -->

    <div>
        <label for="nachname">Nachname:</label>
        <input type="text" name="nachname" id="nachname" value="">
    </div>

    <div>
        <label for="geburtsdatum">Geburtsdatum:</label>
        <input type="date" name="geburtsdatum" id="geburtsdatum" value="">
    </div>

    <div>
        <label for="flugangst">Flugangst:</label>
        <input type="checkbox" name="flugangst" id="flugangst">
    </div>

    <!-- Flug hinzufügen -->
    <div>
        <label for="flug">Flug:</label>
        <select type="text" name="flug" id="flug" value="" style="width: 190px; height: 30px">
            <option>Flug wählen</option>

            <?php
            // Flug hinzufügen
            $flug = query("SELECT * FROM fluege ORDER BY id ASC");

            while ($row = mysqli_fetch_assoc($flug)) {
                echo "<option value='{$row["id"]}'>{$row["flugnr"]}</option>"; // Value ist ID (von Flug) - sichtbares Formularfeld = die Flugnummer
            }
            if (!empty($_POST["flug"]) && $_POST["flug"] == $row["id"]) //gibt die Flug ID aus - und speichert sie später in Tabelle "passagiere(flug_id)"


                /*
            // Flug hinzufügen
            $band = query("SELECT flugnr FROM fluege");
            while ($row = mysqli_fetch_assoc($band)) {
                echo "<option value='{$row["flugnr"]}'>{$row["flugnr"]}</option>";
            }
            */
            ?>

        </select>
    </div>




    <div>
        <label for="submit"></label>
        <button type="submit">Passagier anlegen</button>
    </div>

</form>



<?php

if ($erfolg) {
    echo "<p><strong>Passagier wurde angelegt.</strong></p>";
} else {
}

?>


<?php
include "fuss.php";
?>