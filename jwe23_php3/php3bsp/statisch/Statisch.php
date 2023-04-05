<?php

class Statisch
{
    // Eine staatische Eigenschaft gehört zur einmal existierenden Klasse,
    // NICHT zum Erstellten Objekt.
    // Dadurch bleibt die Eigenschaft über die gesamte Laufzeit bestehen.
    public static int $aufrufe = 0;


    // Diese statische Methode wird auch direkt der Klasse zugeordnet.
    // Wie die Eigenschaft wird sie über Statisch::setze_0() aufgerufen
    // und kann nicht auf $this zugreifen - sie ist nicht Teil des Objektes
    public static function setze_0() // static = wichtig
    {
        self::$aufrufe = 0;
    }

    public function __construct()
    {
        self::$aufrufe += 1;
    }


    public function mache_noch_etwas()
    {
        // Dummy-Funktion
    }
}
