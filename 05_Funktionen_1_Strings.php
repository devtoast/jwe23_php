<!DOCTYPE html>
<html lang="de">

<head>
    <title>05_Funktionen für Strings</title>
</head>

<body>

    <h1>Funktionen für Strings</h1>

    <?php

    // String in Kleinbuchstaben "strtolower"
    $text = "Herzlich Willkommen";
    echo strtolower($text);
    echo "<br>";

    $text2 = "Äerzlich Willkommen";
    echo mb_strtolower($text2);
    // "Multi Byte"!! - z.B. Umlaute belegen 2 Speicherplätze - mb_ (Multi Byte - Methode) vorher

    echo "<br>";


    // Leerzeichn vor und nach einem String entfernen "trim"
    $text3 = "  Herzlich Willkommen  ";
    echo trim($text3);
    echo "<br>";

    $text4 = "  Herzlich Willkommen  ";
    echo trim($text4, "n ");
    // trim stutzt IMMER von außen nach innen (links UND rechts)

    //
    echo "<pre>";
    print_r(trim($text3));
    echo "</pre>";
    //


    // HTML Tags aus einem String entfernen - "strip_tags"
    $text5 = "Das ist <strong>fett</strong> und <em>kursiv</em>.";
    echo strip_tags($text5);
    echo "<br>";
    echo strip_tags($text5, "<strong>");
    echo "<br>";


    // Länge eines Strings zählen - "strlen"
    $text6 = "Arbeit";
    echo strlen($text6);
    echo "<br>";

    $text6 = "Übung";
    echo mb_strlen($text6); // Wieder mb_ wegen Ü
    echo "<br>";

    $text7 = "ß";
    echo strlen($text7);
    echo "<br>";


    // Teil eines Strings extrahieren – "substr"
    $text8 = "Ich bin 43 Jahre alt.";
    // Gib 43 aus
    echo substr($text8, 8, 2);
    // 3 mögliche Parameter 1. was ($text8)- 2. ab wann (start = 0!! (8)) - 3. wieviele Zeichen (2)
    echo "<br>";

    $text9 = "Ich bän 43 Jahre alt."; // mit ä - mb_
    // Gib 43 aus
    echo mb_substr($text9, 8, 2); // auch mb_ möglich !
    // 3 mögliche Parameter 1. was ($text8)- 2. ab wann (start = 0!! (8)) - 3. wieviele Zeichen (2)
    echo "<br>";


    // Zeilenumbrüche in <br> umwandeln - "nl2br" (new line to break)
    $text10 = "Herzlich willkommen
im WIFI
Salzburg";
    echo nl2br($text10);
    echo "<br>";

    ?>

</body>

</html>