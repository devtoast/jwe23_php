<?php

include "kopf.php";
include "funktionen.php";

$erfolg = false;
$sql_passagier_id = escape($_GET["passagier_id"]); // Kommt von "Passagierliste"-Seite Z61 (in URL)


if (!empty($_POST)) {

    $sql_vorname = escape($_POST["vorname"]);
    $sql_nachname = escape($_POST["nachname"]);
    $sql_geburtsdatum = escape($_POST["geburtsdatum"]);
    // $sql_flugangst = escape($_POST["flugangst"]); // Do gibtws nu a Problem

    // Flug hinzufügen
    $sql_flug_id = escape($_POST["flug"]);


    $result = query("SELECT * FROM passagiere WHERE nachname='{$sql_nachname}' AND passagier_id !='{$sql_passagier_id}'");
    $row = mysqli_fetch_assoc($result);

    // Löschen
    query("DELETE FROM passagiere WHERE passagier_id='{$sql_passagier_id}'");

    $erfolg = true;
}

?>

<h1>Passagier löschen</h1>


<?php
// Datenbank nach Passagier-Datensatz fragen und vorbefüllen
$result = query("SELECT * FROM passagiere WHERE passagier_id='{$sql_passagier_id}'"); // Verarbeitet auch die URL id
$row = mysqli_fetch_assoc($result);
?>

<form class="formular" method="post">

    <div>
        <label for="vorname">Vorname:</label>
        <input type="text" name="vorname" id="vorname" value="<?php if (!empty($_POST["vorname"])) {
                                                                    echo htmlspecialchars($_POST["vorname"]);
                                                                } else {
                                                                    echo htmlspecialchars($row["vorname"]);
                                                                } ?>">
    </div>
    <!-- value=" -> zuletzt eingegebener Wert bleibt stehen -->

    <div>
        <label for="nachname">Nachname:</label>
        <input type="text" name="nachname" id="nachname" value="<?php if (!empty($_POST["nachname"])) {
                                                                    echo htmlspecialchars($_POST["nachname"]);
                                                                } else {
                                                                    echo htmlspecialchars($row["nachname"]);
                                                                } ?>">
    </div>

    <div>
        <label for="geburtsdatum">Geburtsdatum:</label>
        <input type="date" name="geburtsdatum" id="geburtsdatum" value="<?php if (!empty($_POST["geburtsdatum"])) {
                                                                            echo htmlspecialchars($_POST["geburtsdatum"]);
                                                                        } else {
                                                                            echo htmlspecialchars($row["geburtsdatum"]);
                                                                        } ?>">
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
        <button type="submit">Passagier löschen</button>
    </div>

</form>



<?php

if ($erfolg) {
    echo "<p><strong>Passagier wurde gelöscht.</strong></p>";
} else {
}

?>



<?php
include "fuss.php";
?>