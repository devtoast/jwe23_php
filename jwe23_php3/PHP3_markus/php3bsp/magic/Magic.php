<?php
class Magic {
    // Speichert alle Eigenschaften über __set(), die nicht
    // als selbstständige Eigenschaften existieren.
    public array $daten = array();

    // Wird von außen eine Eigenschaft GESETZT, die es hier
    // im Objekt nicht gibt, wird automatisch die
    // __set()-Magic-Method verwendet.
    public function __set($variable, $wert) {
        $this->daten[$variable] = $wert;
    }

    // Wird von außen eine Eigenschaft VERWENDET, die es hier
    // im Objekt nicht gibt, wird automatisch die
    // __get()-Magic-Method verwendet.
    public function __get($variable) {
        return $this->daten[$variable];
    }

    // Wird von außen eie METHODE (Funktion) aufgerufen
    // die es hier im Objekt nicht gibt, wird automatisch
    // die __call()-Magic-Method verwendet.
    public function __call($methode, $argumente) {
        echo "Es wurde die Methode {$methode} aufgerufen.";
        echo "<pre>";
        print_r($argumente);
        echo "</pre>";
    }

    // Wird ein komplettes Objekt als String verwendet (z.B. mit echo)
    // so verwendet PHP den Rückgabewert der __toString()-Magic-Method
    public function __toString() {
        return print_r($this->daten, true);
    }
}
