<?php

$db_passwort = "8edb53ce88fb2375d355f5da1ab441aa"; // ist PW + salt

// Passwort verschlüsseln
// Version 1
$passwort = "lisa123";
$salt = "köäkkkäkk"; //wird einfach dem PW vom Nutzer angehängt.
echo $passwort;
echo "<br>";
echo md5($passwort); //md5 - immer gleiche Zeichenkette

echo "<br>";
echo "<br>";

if ("e9803a706f81a40884b8aeafafb2cfd3" == md5($passwort)) {
    echo "Passwort ist korrekt.";
    echo "<br>";
}

echo "<br>";
echo $passwort . $salt;
echo "<br>";


// Version 2
// Verschlüsseln mit Funktion md5 - kombi mit v1
$pw = md5($passwort . $salt); //md5 - immer gleiche Zeichenkette
echo md5($pw);
echo "<br>";
echo mb_strlen($pw);
echo "<br>";
echo "<br>";


// Version 3 = Diese verwenden / password_hasch (Einweg Algorythmus) // Datenbankeintrag - 255 Zeichen!!!
// Verschlüsselt PW jedes Mal neu!!!!!!!!!!! - SUPER SICHER!
//https://www.php.net/manual/de/function.password-hash.php
echo password_hash($passwort, PASSWORD_DEFAULT);
