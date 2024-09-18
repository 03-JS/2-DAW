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
                <th><b>Suma Acumulada</b></th>
            </tr>
            <?php
            $suma = 0;
            for ($i = 1; $i <= 500; $i++) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$suma</td>";
                echo "</tr>";
                $suma += $i;
            }
            ?>
        </table>
    </body>
</html>