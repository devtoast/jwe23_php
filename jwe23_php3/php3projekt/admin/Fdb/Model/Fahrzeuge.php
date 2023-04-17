<?php

namespace WIFI\Fdb\Model;

use WIFI\Fdb\Model\Row\Fahrzeug;
use WIFI\Fdb\Mysql;

class Fahrzeuge
{
    /**
     * Gibt alle Fahrzeuge zurück
     * @return array Ein array mit mehreren Fahreug Objekten.
     */
    public function alleFahrzeuge(): array
    {
        $db = Mysql::getInstanz();

        $fahrzeugeGesamt = array();

        $result = $db->query("SELECT * FROM fahrzeuge");
        while ($row = $result->fetch_assoc()) {

            /* echo "<pre>";
            print_r($row);
            exit;
            */
            $fahrzeugeGesamt[] = new Fahrzeug($row);
        }
        return $fahrzeugeGesamt;
    }
}
