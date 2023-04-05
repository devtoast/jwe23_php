<?php

namespace WIFI\JWE\Tier;
// Eigener Namensraum für das Projekt bzw. diese Klasse
// Wird verwendet um gleich benannten Klassen in veschiedenen Projekten zu erlauben. 

// Abstract vor Klasse heißt: 
// Diese Klasse muß extendet werden.
// Sie kann nicht selbst als Objekt erstellt werden.
abstract class TierAbstract
{
    // Sichtbarkeits-Modifikatoren
    // public: kann von außen gelesen und geändert werden.
    // protected: Diese Klasse und Kind-Klassen können die Eigenschaft verwenden.
    // private: Ausschließlich DIESE Klasse kann die Eigenschaft verwenden.
    private readonly string $name; // = Eigenschaft
    // "readonly" bei Eigenschaften (seit PHP 8.1)
    // Eigenschaft kann einmalig gesetzt werden (construct) und danach
    // nicht mehr geändert werden - nur gelesen.


    public function __construct(string $tiername)
    {
        $this->name = $tiername;
    }

    // Constructor promotion (seit PHP 8.0)
    // public function __construct(private string $name) {}
    // Bei dieser Schreibweise muß man die Eigenschaft nicht mehr definieren
    // und die Zuweisung im Konstruktor passiert automatisch.
    // Ansonsten ist das Verhalten gleich wie oben.


    // public final function getName()
    // Wenn etwas final ist kann keine Kind-Klasse diese Methode
    // überschreiben (z.B.: Maus)
    public function getName(): string
    {
        return $this->name;
    }

    // Abstract vor Methode heißt:
    // Diese Methode MUSS in Kind-Klassen überschrieben werden.
    abstract public function gibLaut(): string;
}
