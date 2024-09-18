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
                <th><b>Listado de Números</b></th>
            </tr>
            <?php
            $suma = 0;
            for ($i = 200; $i <= 500; $i++) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "</tr>";
                $suma += $i;
            }
            echo "<tr>";
            echo "<td><b>Suma: $suma</b></td>";
            echo "</tr>";
            ?>
        </table>
    </body>
</html>