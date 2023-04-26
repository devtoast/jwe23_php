<?php
namespace WIFI\Fdb\Model;

use WIFI\Fdb\Model\Row\Marke;
use WIFI\Fdb\Mysql;

class Marken {
    /**
     * Gibt alle Marken zurück.
     * @return array Ein array mit mehreren Marke Objekten drin.
     */
    public function alleMarken(): array {
        $db = Mysql::getInstanz();

        $markenGesamt = array();
        $result = $db->query("SELECT * FROM marken");
        while ($row = $result->fetch_assoc()) {
            $markenGesamt[] = new Marke($row);
        }
        return $markenGesamt;
    }
}
