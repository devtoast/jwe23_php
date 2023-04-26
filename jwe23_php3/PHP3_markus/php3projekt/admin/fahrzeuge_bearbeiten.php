<?php
use WIFI\Fdb\Model\Row\Fahrzeug;
use WIFI\Fdb\Model\Marken;
use WIFI\Fdb\Validieren;

include "setup.php";
ist_eingeloggt();

$erfolg = false;

//prüfen ob das Formular abgeschickt wurde
if (!empty($_POST)) {

    $validieren = new Validieren();
    $validieren->istAusgefuellt($_POST["marken_id"], "Marke");
    $validieren->istAusgefuellt($_POST["modell"], "Modell");
    $validieren->istAusgefuellt($_POST["farbe"], "Farbe");
    $validieren->istAusgefuellt($_POST["fin"], "Fahrzeug-ID-Nr.");

    if (!$validieren->fehlerAufgetreten()) {
        // alles ok -> speichern
        $fahrzeug = new Fahrzeug(array(
            "id" => $_GET["id"] ?? null, // wenn id vorhanden, dann verwenden, sonst den Wert rechts
            "marken_id" => $_POST["marken_id"],
            "modell" => $_POST["modell"],
            "farbe" => $_POST["farbe"],
            "fin" => $_POST["fin"]
        ));
        $fahrzeug->speichern();
        $erfolg = true;
    }

}



include "kopf.php";
?>

    <h1>Fahrzeug bearbeiten </h1>
<?php
 if ( $erfolg) {
    echo "<p><strong>Fahrzeug wurde bearbeitet.</strong><br>
    <a href='fahrzeuge_liste.php'>Zurück zur Liste</a></p>";    

 } else {

    if ( !empty($validieren) ) {
        echo $validieren->fehlerHtml();
    }

    if (!empty($_GET["id"])) {
        // bearbeiten-modus - Fahrzeugdaten ermitteln
        $fahrzeug = new Fahrzeug($_GET["id"]);
    }

?>

    <form action="fahrzeuge_bearbeiten.php<?php 
        if (!empty($fahrzeug)) {
            echo "?id=" . $fahrzeug->id;
        }
    ?>" method="post">
        <div>
            <label for="marken_id">Marke:</label>
            <select name="marken_id" id="marken_id">
                <option value="">- Bitte wählen -</option>
                <?php
                $marken = new Marken();
                $alleMarken = $marken->alleMarken();
                foreach ($alleMarken as $marke) {
                    echo "<option value='{$marke->id}'";
                    if ( !empty($_POST["marken_id"]) && $_POST["marken_id"] == $marke->id) {
                        echo " selected";
                    } else if (!empty($fahrzeug) && $fahrzeug->marken_id == $marke->id) {
                        echo " selected";
                    }
                    echo ">{$marke->hersteller}</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="modell">Modell:</label>
            <input type="text" name="modell" id="modell" value="<?php if( !empty($_POST["modell"]) ) {
                echo htmlspecialchars($_POST["modell"]);
            } else if (!empty($fahrzeug)) {
                echo htmlspecialchars($fahrzeug->modell);
            } ?>">
        </div>

        <div>
            <label for="farbe">Farbe:</label>
            <input type="text" name="farbe" id="farbe" value="<?php if( !empty($_POST["farbe"]) ) {
                echo htmlspecialchars($_POST["farbe"]);
            } else if (!empty($fahrzeug)) {
                echo htmlspecialchars($fahrzeug->farbe);
            } ?>">
        </div>

        <div>
            <label for="fin">Fahrzeug-Identifikationsnr.:</label>
            <input type="text" name="fin" id="fin" value="<?php if( !empty($_POST["fin"]) ) {
                echo htmlspecialchars($_POST["fin"]);
            } else if (!empty($fahrzeug)) {
                echo htmlspecialchars($fahrzeug->fin);
            } ?>">
        </div>

        <div>
            <button type="submit">Fahrzeug speichern</button>
        </div>
    </form>
<?php
}
include "fuss.php";