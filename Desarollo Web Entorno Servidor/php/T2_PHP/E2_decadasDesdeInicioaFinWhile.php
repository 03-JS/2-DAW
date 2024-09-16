<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E2_decadasDesdeInicioaFinWhile</title>
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
            $num = 2000;
            while ($num <= 2100) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "</tr>";
                $num += 10;
            }
            ?>
        </table>
    </body>
</html>