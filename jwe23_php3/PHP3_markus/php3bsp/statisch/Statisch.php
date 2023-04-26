<?php
class Statisch {
    // Eine statische Eigenschaft gehört zur einmal existierenden Klasse,
    // nicht zum erstellten Objekt.
    // Dadurch bleibt die Eigenschaft über die gesamte Laufzeit bestehen.
    public static int $aufrufe = 0;

    // Diese statische Methode wird auch direkt der Klasse zugeordnet.
    // Wie die Eigenschaft wird sie über Statisch::setze_0() aufgerufen
    // und kann nicht auf $this zugreifen - sie ist nicht Teil des Obejekts.
    public static function setze_0() {
        self::$aufrufe = 0;
    }

    public function __construct() {
        self::$aufrufe += 1;
    }

    public function machen_etwas() {

    }

}
