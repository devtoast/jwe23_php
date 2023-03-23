<!DOCTYPE html>
<html lang="de">

<head>
    <title>09_For-Schleifen</title>
</head>

<body>

    <h1>09 For-Schleifen</h1>

    <?php

    // 1 - 10 In einer HTML Tabelle darstellen

    echo "<table border='1'>";

    for ($row = 1; $row <= 10; $row++) {
        // Gneriert einzelne Zeilen
        echo "<tr>";

        for ($spalte = 1; $spalte <= 10; $spalte++) {
            // Gneriert einzelne Spalten
            echo "<td>";

            if ($spalte * $row % 7 != 0) {
                echo $spalte * $row;
            }


            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";


    echo "<br>";


    echo "<table border='1'>";

    for ($row = 1; $row <= 10; $row++) {

        echo "<tr>";

        for ($spalte = 1; $spalte <= 10; $spalte++) {
            echo "<td>";

            if ($spalte * $row % 7 != 0) {
                echo $spalte * $row;
            }

            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";


    echo "<br>";


    echo "<table border='1'>";

    for ($row = 1; $row <= 10; $row++) {

        if ($row == 6) continue;

        echo "<tr>";

        for ($spalte = 1; $spalte <= 10; $spalte++) {
            echo "<td>";

            if ($spalte * $row % 7 != 0) {
                echo $spalte * $row;
            }

            echo "</td>";
        }

        echo "</tr>";
    }

    echo "</table>";


    echo "<br>";



    ?>

    <br>
    <br>

    <table border="1">
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>...</td>
        </tr>
        <tr>
            <td>2</td>
            <td>4</td>
            <td>6</td>
            <td>...</td>
        </tr>
        <tr>
            <td>3</td>
            <td>6</td>
            <td>9</td>
            <td>...</td>
        </tr>
    </table>

</body>

</html>