<?php

// Klasse definieren, die später als Objekt verwendet werden kann
class Person
{
    // Eigenschaft (engl. property) festlegen: Platzhalter für spätere Werte (wie Variable)
    // private Eigenschaften (oder Methoden) können nur innerhalb der Klasse angesprochen werden
    private $vorname;

    // Konstruktor: Wird automatisch aufgerufen sobald das Objekt erzueugt wird
    // __construct = PHP-Funktion
    // z.B.: new Person()
    public function __construct($name)
    {
        $this->vorname = $name;
    }

    // Öffentliche Methode (public), die von außen angesprochen werden kann
    public function vorstellen()
    {
        return "Hallo, ich bin " . $this->vorname;
    }

    // Methode zum holen des privaten Vornamens
    // Ein sogenannter "getter"
    public function get_vorname()
    {
        return $this->vorname;
    }

    // Methode zum ändern des privaten Vornamens
    // Ein sogenannter "setter"
    public function set_vorname($name_neu)
    {
        // Durch diese Methode haben wir die Möglichkeit Überprüfungen 
        // vor dem Setzen des neuen Namens einzufügen
        if ($this->vorname == $name_neu) {
            echo "<strong>So heiße ich bereits!</strong>";
        } else {
            $this->vorname = $name_neu;
        }
    }
}
