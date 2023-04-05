<?php

namespace WIFI\JWE;

use WIFI\JWE\Tier\TierAbstract;

class Tiere implements TiereInterface, \Iterator
{

    private array $herde = array();  // array() od. []


    // Typdeklaration (Type-Hint): TieAbstract
    // Nur Objekte die von "TierAbstract" erben, oder selbst "TierAbstract" sind
    // dürfen als Argument an diese Methode übergeben werden.
    public function add(TierAbstract $tier): void
    {
        $this->herde[] = $tier; // [] ist gleich wie array_push
    }

    public function ausgabe()
    {
        $ret = "";
        foreach ($this->herde as $tier) {
            $ret .= $tier->getName();
            $ret .= " macht ";
            $ret .= $tier->gibLaut();
            $ret .= "<br>";
        }

        return $ret;
    }

    // Iterator-Interface Implementierung Z7
    private int $index = 0;

    public function current(): mixed
    {
        return $this->herde[$this->index];
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): mixed
    {
        return $this->index;
    }

    public function valid(): bool
    {
        // V1 
        // return isset($this->herde[$this->index]); 
        // isset gibt sowieso true od. false zurück

        // isset — Prüft, ob eine Variable deklariert ist 
        // und sich von null unterscheidet

        // V2
        if (isset($this->herde[$this->index])) {
            return true;
        } else {
            return false;
        }
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
