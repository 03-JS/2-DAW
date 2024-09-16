<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E2_contadorDesdeInicioaFinIncrementoWhile</title>
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
                <th><b>Incremento de valor en 3</b></th>
            </tr>
            <?php
            $num = 33;
            $cont = 0;
            while ($cont < 10) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "</tr>";
                $num += 3;
                $cont++;
            }
            ?>
        </table>
    </body>
</html>