<?php

namespace WIFI\Fdb;

class Validieren
{
    private array $errors = array();

    /**
     * Prüfen, ob ein Wert (aus Formular) ausgefüllt ist.
     * @param string $wert Der Wert, der auf "ausgefüllt" geprüft werden soll.
     * @param string $feldname Name des Formularfeldes für die FEHLERMELDUNG
     * @return bool False wenn $wert leer ist, ansonsten true.
     */

    public function istAusgefuellt(string $wert, string $feldname): bool
    // feldname kommt aus login.php Z10 11 "Benutzer" od. "Passwort"
    {
        if (empty($wert)) {
            $this->errors[] = "{$feldname} war leer.";
            return false;
        } else {
            return true;
        }
    }

    // Ob ein Fehler aufgetreten ist?
    public function fehlerAufgetreten(): bool
    {
        // return !empty($this->errors); // Gleiches Ergebnis wie unten empty gibt true od. false zurück.

        if (empty($this->errors)) {
            return false;
        }
        return true; // wie oben mit else - andere Schreibweise
    }

    public function fehlerHinzu(string $fehlermeldung): void
    {
        $this->errors[] = $fehlermeldung;
    }

    // Fehler ausgeben (wenn aufgetreten)
    public function fehlerHtml(): string
    {

        if (!$this->fehlerAufgetreten()) {
            return "";
        }

        $ret = "<ul>";
        foreach ($this->errors as $error) {
            $ret .= "<li>{$error}</li>";
        }
        $ret .= "</ul>";
        return $ret;
        //return implode("<br> ", $this->errors);
    }
}
