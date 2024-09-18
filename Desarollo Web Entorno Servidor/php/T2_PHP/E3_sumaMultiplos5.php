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
                <th><b>Listado de Múltiplos</b></th>
            </tr>
            <?php
            $n = 5;
            $suma = 0;
            for ($i = 0; $i < 15; $i++) {
                echo "<tr>";
                echo "<td>$n</td>";
                echo "</tr>";
                $suma += $n;
                $n += 5;
            }
            echo "<tr>";
            echo "<td><b>Suma: $suma</b></td>";
            echo "</tr>";
            ?>
        </table>
    </body>
</html>