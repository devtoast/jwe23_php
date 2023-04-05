<?php

class Magic
{
    // Speichert alle Eigenschaften über __set(), die nicht
    // als selbständige Eigenschaften existieren.
    private array $daten = array(); // = array() = Standartwert (leeres Array)

    // Wird von außen eine Eigenschaft GESETZT, die es hier
    // im Objekt nicht gibt, wird automatisch die
    // __set()-Magic-Method verwendet.
    public function __set($variable, $wert)
    {
        // echo "hallo";
        // echo $variable;
        // echo $wert;

        $this->daten[$variable] = $wert;
    }

    // Wird von außen eine Eigenschaft VERWENDET, die es hier
    // im Objekt nicht gibt, wird automatisch die
    // __get()-Magic_Method verwendet.
    public function __get($variable)
    {
        return $this->daten[$variable];
    }

    // Wird von außen eine METHODE (Funktion) aufgerufen
    // die es hier im Objekt nicht gibt, wird automatisch
    // die __call()-Magic-Method verwendet.
    public function __call($methode, $argumente)
    {
        echo "Es wurde die Methode {$methode} aufgerufen";
        print_r($argumente);
    }

    // Wird ein komplettes Objekt als String verwendet (z.B.: mit echo) (Objekt $m)
    // so verwendet PHP den Rückgabewert der __toString()-Magic-Method
    public function __toString() // Zum debuggen
    {
        return print_r($this->daten, true);
    }
}
