<?php

namespace WIFI\Fdb\Model\Row;

class Fahrzeug extends RowAbstract
{
    protected string $tabelle = "fahrzeuge";
    // Tabellenname aus DB - für RowAbstract (Übergabe des richtigen Tabellennamens)

    // Gibt ein Objekt Marke zurück (: Marke)
    public function marke(): Marke
    {
        return new Marke($this->marken_id);
    }
}
