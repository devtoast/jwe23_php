<?php

namespace WIFI\JWE\Tier;

// "extends TierAbstract" kopiert alle Eigenschaften und Methoden von der
// übergeordneten "TierAbstract" Klasse (die nicht private sind!).
// Somit hat diese Klasse alle Möglichkeiten des Eltern-Objekts.
class Maus extends TierAbstract
{
    // Wenn eine Methode definiert wird die mit selben Namen in der
    // Eltern-Klasse (TierAbstract)bereits existiert, so wird diese überschrieben.
    public function getName(): string
    {
        // parent::getName() ruft von der Eltern-Klasse (TierAbstract)
        // die Methode "getName()" auf und wir könen den Rückgabewert
        // in unserer überschriebenen Methode weiter verwenden.
        $name = parent::getName(); // Jerry
        return $name . " (Maus)"; // Jerry + (Maus)
    }

    public function gibLaut(): string
    {
        return "Pieps!";
    }
}
