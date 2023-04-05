<?php

/**
 * Diese Blöcke sind Beispiele für "phpDoc" "DocBlock" und können mit phpDocumentor verarbeitet werden.
 */


class Kreis
{

    // Konstante die fix einer Klasse zugeordnet ist
    const PI = 3.141592654;

    // private kann von außen (z.B.: index.php) nicht verändert werden
    // float definiert auch hier den Datentyp
    private float $radius;

    public function __construct(float $r) // __construct - wenn Objekt erzeugt wird
    {
        //$this->radius = $r;
        $this->set_radius($r);
        // den Radius mit Funktion von unten setzen
    }

    public function __destruct() // __destruct letzte Mögl. einzugreifen
    {
        echo "Kreis mit Radius " . $this->radius . " wurde zerstört. <br>";
    }

    public function flaeche(): float
    {
        return pow($this->radius, 2) * self::PI;
    }
    // pow = x*x (radius * radius)
    // self steht stellvertretend für den Klassennamen (Kreis - falls der sich ändern sollte)

    public function durchmesser(): float
    {
        return $this->radius * 2;
    }

    /**
     * Berechnet anhand des gegebenen Radius den Umfang des Kreises
     * @return float Der berechnete Umfang des Kreises.
     */

    // : float NACH Klammer - Fixiert den Rückgabewert als float MUSS returnen
    public function umfang(): float
    {
        return $this->durchmesser() * self::PI;
    }

    // phpDoc DocBlock
    /**
     * Setzt einen neuen Radius für einen Kreis.
     * Auch wenn der Kreis bereits existiert und mit einem Radius im Konstruktor
     * befüllt wurde, kann man so eine neuen Radius setzen.
     * @param int|float $neuer_radius Der neue Radius der gesetzt werden soll.
     * @return void (Leere)
     * @throws Exeption
     */

    // float Argument MUSS float sein - Fixiert den Eingabewert
    // void - KEIN Rückgabewert
    public function set_radius(float $neuer_radius): void
    {
        if ($neuer_radius <= 0) {
            // Wirft eine Exeption, die als ein Fehler am Bildschirm aufscheint
            // Gibt Kollegen eine Hinweis waas sie fasch gemacht haben
            // Exeption = PHP-Klassse wird mit new zu Objekt!!!!
            throw new Exception("Radius muß größer 0 sein!");
        }
        $this->radius = $neuer_radius;
    }
}
