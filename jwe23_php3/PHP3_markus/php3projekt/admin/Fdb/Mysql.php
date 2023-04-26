<?php
namespace WIFI\Fdb;

class Mysql {

    // Singleton Implementierung
    // Vermeidet mehrfache Erstellung des selben Objekts.
    // Hier gewünscht, um nicht mehrere Datenbank-Verbindungen
    // gleichzeitig zu öffnen.
    private static ?Mysql $instanz = null;

    public static function getInstanz(): Mysql {
        if (!self::$instanz) {
            self::$instanz = new Mysql();
        }
        return self::$instanz;
    }
    // Singleton Implementierung ENDE

    private \mysqli $db;

    private function __construct() {
        $this->verbinden();
    }

    private function verbinden(): void {
        // Mysqli-Objekt erstellen und Verbindung aufbauen
        $this->db = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORT, MYSQL_DATENBANK);
        // Zeichensatz mitteilen
        $this->db->set_charset("utf8");
    }

    public function escape(string $wert): string {
        return $this->db->real_escape_string($wert);
    }

    public function query(string $sqlBefehl): \mysqli_result|bool {
        $result = $this->db->query($sqlBefehl);
        return $result;
    }
}
