<?php
/**
 * Diese Blöcke sind Beispiele für "phpDoc" / "DocBlock"
 * und können mit phpDocumentor verarbeitet werden.
 */

class Kreis {
    // Konstante, die fix einer Klasse zugeordnet ist
    const PI = 3.141592654;

    private float $radius;

    public function __construct(float $r) {
        $this->set_radius($r);
    }

    public function __destruct() {
        echo "Kreis mit Radius " . $this->radius . " wurde zerstört.<br>";
    }

    public function flaeche(): float {
        return pow($this->radius, 2) * self::PI;
    }

    public function durchmesser(): float {
        return $this->radius * 2;
    }

    /**
     * Berechnet anhand des gegebenen Radius dem Umfang des Kreises.
     * @return float Der berechnete Umfang des Kreises.
     */
    public function umfang(): float {
        return $this->durchmesser() * self::PI;
    }

    /**
     * Setzt einen neuen Radius für den Kreis.
     * Auch wenn der Kreis bereits existiert und mit einem Radius im Konstruktor
     * befüllt wurde, kann man so einen neuen Radius setzen.
     * @param int|float $neuer_radius Der neue Radius der gesetzt werden soll.
     * @return void
     * @throws Exception
     */
    public function set_radius(float $neuer_radius): void {
        if ($neuer_radius <= 0) {
            // Wirft eine Exception, die als Fehler am Bildschirm aufscheint
            // Gibt Kollegen einen Hinweis, was sie falsch gemacht haben
            throw new Exception("Radius muss größer 0 sein.");
        }
        $this->radius = $neuer_radius;
    }
}
