<?php
namespace WIFI\Fdb\Model\Row;

use WIFI\Fdb\Mysql;

abstract class RowAbstract {
    protected string $tabelle;

    private array $daten = array();

    public function __construct(int|array $idOderDaten) {
        if (is_int($idOderDaten)) {
            // id wurde übergeben, Daten aus Datenbank auslesen
            $db = Mysql::getInstanz();
            $sqlId = $db->escape($idOderDaten);
            $result = $db->query("SELECT * FROM {$this->tabelle} WHERE id = '{$sqlId}' ");
            $this->daten = $result->fetch_assoc();
        } else {
            // Fertiges array wurde übergeben, verwenden wie gegeben.
            $this->daten = $idOderDaten;
        }
    }

    public function __get(string $eigenschaft): mixed {
        if (!array_key_exists($eigenschaft, $this->daten)) {
            throw new \Exception("Die Spalte {$eigenschaft} existiert in der Tabelle nicht.");
        }
        return $this->daten[ $eigenschaft ];
    }

    public function entfernen(): void {
        $db = Mysql::getInstanz();
        $sqlId = $db->escape($this->id);
        $db->query("DELETE FROM {$this->tabelle} WHERE id = '{$sqlId}' ");
    }

    public function speichern(): void {
        $db = Mysql::getInstanz();

        // Felder für SQL-Abfrage zusammen bauen
        $sqlFelder = "";
        foreach ($this->daten as $spaltenname => $formularwert) {
            if ($spaltenname == "id") {
                continue;
            }
            $sqlFormularwert = $db->escape($formularwert);
            $sqlFelder .= "{$spaltenname} = '{$sqlFormularwert}', ";
        }

        // Letztes Komma entfernen
        $sqlFelder = rtrim($sqlFelder, " ,");

        if ( !empty($this->daten["id"]) ) {
            // in DB bearbeiten
            $sqlId = $db->escape($this->daten["id"]);
            $db->query("UPDATE {$this->tabelle} SET {$sqlFelder} WHERE id = '{$sqlId}' ");
        } else {
            // in DB einfügen
            $db->query("INSERT INTO {$this->tabelle} SET {$sqlFelder} ");
        }


    }
}
