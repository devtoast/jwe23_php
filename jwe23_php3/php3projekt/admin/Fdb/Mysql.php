<?php

namespace WIFI\Fdb;

class Mysql
{

    // Singleton implementierung

    // Vwermeidet mehrfache Erstellung des selben Objektes.
    // Hier gewünscht, um nicht mehrere Datenbank_Verbindungen
    // gleichzeitig zu öffnen.
    private static ?Mysql $instanz = null; // Fragezeichen null oder Mysql (Mysql || null - ginge auch)

    public static function getInstanz(): Mysql // Nur 1x Datenbankverbindung
    {
        if (!self::$instanz) {  // null // Doppelpunkte weil static (sonst wäre es Pfeil ->)
            self::$instanz = new Mysql(); // neues Objekt von sich selbst
        }
        return self::$instanz;
    }
    // Singleton implementierung ENDE


    private \mysqli $db;

    private function __construct()
    {
        $this->verbinden();
    }

    private function verbinden(): void
    {
        //Mysqli-Objekt erstellen und Verbindung aufbauen (\Backslash bei PHP Eigenobjekten - jedenfalls bei eigenen Namespaces)
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORT, MYSQL_DATENBANK); // aus setup-php
        // Zeichensatz mitteilen
        $this->db->set_charset("utf8");
    }


    public function escape(string $wert): string
    {
        // return mysqli_real_escape_string($db, $wert);
        return $this->db->real_escape_string($wert);
        // IMMER mit real_escape_string - Maskiert Sonderzeichen - behandeln!!!!!!!!
    }

    public function query(string $sqlBefehl): \mysqli_result|bool
    {
        $result = $this->db->query($sqlBefehl);
        return $result;
    }
}
