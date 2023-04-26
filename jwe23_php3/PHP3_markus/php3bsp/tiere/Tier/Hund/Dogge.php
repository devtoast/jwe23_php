<?php
namespace WIFI\JWE\Tier\Hund;

use WIFI\JWE\Tier\Hund;

// Vererbungen können über mehrere Ebenen gehen
class Dogge extends Hund {

    public function gibLaut(): string {
        return "Grrrrrr!";
    }

    // Jede Klasse kann beliebig Methoden (und Eigenschaften) erweitern.
    public function beissen(): string {
        return "Autsch!";
    }
}
