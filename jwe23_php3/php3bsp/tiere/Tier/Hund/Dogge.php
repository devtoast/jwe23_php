<?php

namespace WIFI\JWE\Tier\Hund;

use WIFI\JWE\Tier\Hund;

// Vererbungen können über mehrere Ebenen gehen
class dogge extends Hund
{
    public function gibLaut(): string
    {
        return "Grrrr";
    }

    // Jede Klasse kann beliebige Methoden (und Eigenschaften) erweitern.
    public function beissen(): string
    {
        return "Autsch!";
    }
}
