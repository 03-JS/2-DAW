<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E2_decadasDesdeInicioaFinFor</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 35%
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th><b>Décadas desde el 2000 al 2100</b></th>
            </tr>
            <?php
            for ($i = 2000; $i < 2110; $i += 10) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>