<?php

namespace WIFI\Fdb\Model\Row;

use WIFI\Fdb\Mysql; // Erlaubt getInstanz (Die Datenbankverbindung) aus Mysql Z11

abstract class RowAbstract
{

    protected string $tabelle;

    private array $daten = array();

    public function __construct(int|array $idOderDaten) // oder Daten weil in Fahrzeuge Array
    {
        if (is_int($idOderDaten)) {
            // ID wurde übergeben, Daten aus DB ausgeben
            $db = Mysql::getInstanz(); // Mit DB verbinden
            // Oder // $db = \WIFI\Fdb\Mysqll::getInstanz();

            $sqlId = $db->escape($idOderDaten); // Maskiert Sonderzeichen

            $result = $db->query("SELECT * FROM {$this->tabelle} WHERE id = '{$sqlId}'");
            $this->daten = $result->fetch_assoc();

            /*
        echo "<pre>";
        print_r($this->daten);
        */
        } else {
            // Fertiges Array wurde übergeben, verwenden wie gegeben. (aus Fahrzeuge.php)
            $this->daten = $idOderDaten;
        }
    }

    public function __get(string $eigenschaft): mixed
    {
        if (!array_key_exists($eigenschaft, $this->daten)) { // array_key - Wie Name aus DB (Argument $eigenschaft)
            throw new \Exception("Die Spalte {$eigenschaft} existiert in der Tabelle nicht");
        }
        return $this->daten[$eigenschaft];
    }

    public function entfernen(): void
    {
        $db = Mysql::getInstanz(); // Mit DB verbinden
        $sqlId = $db->escape($this->id); // Maskiert Sonderzeichen
        $db->query("DELETE FROM {$this->tabelle} WHERE id = '{$sqlId}' ");
    }

    public function speichern(): void
    {
        $db = Mysql::getInstanz();

        // Felder für SQL-Abfrage zusammenbauen
        $sqlFelder = "";
        foreach ($this->daten as $spaltenname => $formularwert) {
            if ($spaltenname == "id") {
                continue;
            }
            $sqlFormularwert = $db->escape($formularwert);
            $sqlFelder .= "{$spaltenname} = '{$sqlFormularwert}', ";
        }

        // Letztes Komma entfernen (rtrim - rechtsTrim)
        $sqlFelder = rtrim($sqlFelder, " ,");


        if (!empty($this->daten["id"])) {
            // in DB bearbeiten
            $sqlId = $db->escape($this->daten["id"]);
            $db->query("UPDATE {$this->tabelle} SET {$sqlFelder} WHERE id = '{$sqlId}'");
        } else {
            // in DB einfügen
            $db->query("INSERT INTO {$this->tabelle} SET {$sqlFelder}");
        }

        /*
        echo "<pre>";
        print_r($this->daten);
        echo "</pre>";
        */
    }
}
