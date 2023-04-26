<?php
namespace WIFI\Fdb;

class Validieren {
    private array $errors = array();

    /**
     * Prüfen, ob ein Wert (aus Formular) ausgefüllt ist.
     * @param string $wert Der Wert, der auf "ausgefüllt" geprüft werden soll.
     * @param string $feldname Name des Formularfeldes für die Fehlermeldung.
     * @return bool False wenn $wert leer ist, ansonsten true.
     */
    public function istAusgefuellt(string $wert, string $feldname): bool {
        if (empty($wert)) {
            $this->errors[] = "{$feldname} war leer.";
            return false;
        }
        return true;
    }

    public function fehlerHinzu(string $fehlermeldung): void {
        $this->errors[] = $fehlermeldung;
    }

    public function fehlerAufgetreten(): bool {
        return !empty($this->errors);
    }

    public function fehlerHtml(): string {
        if (!$this->fehlerAufgetreten()) {
            return "";
        }

        $ret = "<ul>";
        foreach ($this->errors as $error) {
            $ret .= "<li>{$error}</li>";
        }
        $ret .= "</ul>";
        return $ret;
    }

}
