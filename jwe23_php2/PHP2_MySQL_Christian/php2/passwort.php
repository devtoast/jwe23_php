<?php

$db_passwort = "470c766c04ebf1e30bab171b05c8a3c9";
$passwort = "lisa123";
$salt = "köakkäkk"; //wird einfach dem PW vom Nutzer angehängt.
echo "<br>";
echo $passwort;
echo "<br>";
echo md5($passwort);
echo "<br>";
echo "<br>";

if ("e9803a706f81a40884b8aeafafb2cfd3" == md5($passwort) ) {
    echo "passwort ist korrekt.";
    echo "<br>";
}

echo "<br>";
echo $passwort . $salt;
echo "<br>";
$pw = md5($passwort . $salt);
echo md5($pw);
echo "<br>";
echo mb_strlen($pw);


echo "<br>";
echo "<br>";
echo password_hash($passwort, PASSWORD_DEFAULT);



