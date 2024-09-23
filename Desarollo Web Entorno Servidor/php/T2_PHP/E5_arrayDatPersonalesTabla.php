<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            table, th, td {
                border: 1px solid black;
                width: 25%
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th colspan="2">Datos Personales</th>
            </tr>
            <?php
            include ("E5_datPersonales.php");

            $personas = array($nombre, $apellidos, $edad, $tlf, $nombre1, $apellidos1, $edad1, $tlf1);
            $header = array("Nombre", "Apellidos", "Edad", "Teléfono");

            for ($i = 0; $i < 2; $i++) {
                for ($j = 0; $j < count($header); $j++) {
                    $index = $i > 0 ? $j + 4 : $j;
                    echo "<tr>";
                    echo "<td><b>$header[$j]</b></td>";
                    echo "<td>$personas[$index]</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </body>
</html>