<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E2_contadorDesdeInicioaFinIncrementoFor</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                width: 25%
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <th><b>Incremento de valor en 2.5</b></th>
            </tr>
            <?php
            $num = 33;
            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "</tr>";
                $num += 2.5;
            }
            ?>
        </table>
    </body>
</html>