<?php
include "funktionen.php";
ist_eingeloggt(); // Ist der Benutzer überhaupt eingeloggt bzw. muss eingeloggt sein

$errors = array();
$erfolg = false;

$sql_id = escape($_GET["id"]); // Durch escape schicken - hätte manipuliert werden können GET aus URL
// Hilft beim Vorbefüllen der Eingabefelder

//Prüfen ob das Formular abgeschickt wurde

if (!empty($_POST)) {
    //var_dump($_POST); // zum anschauen
    echo "<br>";
    $sql_titel = escape($_POST["titel"]);
    // var_dump($sql_titel);
    echo "<br>";
    $sql_kcal_pro_100 = escape($_POST["kcal_pro_100"]);

    if (empty($sql_titel)) {
        $errors[] = "Bitte geben Sie einen Titel für die Zutat ein.";
    } else {
        $result = query("SELECT * FROM zutaten WHERE titel = '{$sql_titel}' AND id !='{$sql_id}'");
        //var_dump($result);
        echo "<br>";
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        echo "<br>";
        if ($row) {
            $errors[] = "Diese Zutat existiert bereits.";
        }
    }

    if (empty($errors)) {
        if ($sql_kcal_pro_100 == "") {
            $sql_kcal_pro_100 = "NULL";
        }

        query("UPDATE `zutaten`SET titel= '{$sql_titel}', kcal_pro_100 = {$sql_kcal_pro_100} WHERE id = '{$sql_id}'");
        // ACHTUNG Anführungszeichen!!!!!!!!!!

        $erfolg = true;
    }
}



include "kopf.php";

?>





<h1>Zutat bearbeiten</h1>

<?php
if ($erfolg) {
    echo "<p><strong>Zutat wurde bearbeitet</strong><br><a href='zutaten_liste.php'>Zurück zur Liste</a></p>";
} else {

    // ACHTUNG er

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $key => $error) {
            echo "<li>{$error}</li>";
        }
        echo "</ul>";
    }

    // Datenbank nach Zutat-Datensatz fragen und vorbefüllen
    $result = query("SELECT * FROM zutaten WHERE id='{$sql_id}'");
    $row = mysqli_fetch_assoc($result);

?>

    <form method="post">

        <div>
            <label for="titel">Titel:</label>
            <input type="text" name="titel" id="titel" value="<?php if (!empty($_POST["titel"])) {
                                                                    echo htmlspecialchars($_POST["titel"]);
                                                                } else {
                                                                    echo htmlspecialchars($row["titel"]);
                                                                } ?>">
        </div>
        <!-- value=" -> In diesem Fall übergibt value mit else den wert aus der Zutatenliste (Feld ist vorausgefüllt) -->

        <div>
            <label for="kcal_pro_100">KCal/100:</label>
            <input type="number" name="kcal_pro_100" id="kcal_pro_100" value="<?php if (!empty($_POST["kcal_pro_100"])) {
                                                                                    echo htmlspecialchars($_POST["kcal_pro_100"]);
                                                                                } else {
                                                                                    echo htmlspecialchars($row["kcal_pro_100"]);
                                                                                } ?>">>
        </div>

        <div>
            <button type="submit">Zutat speichern</button>
        </div>



    </form>


<?php
}
include "fuss.php";
