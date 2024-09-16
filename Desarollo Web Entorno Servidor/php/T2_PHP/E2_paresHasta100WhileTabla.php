<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E2_paresHasta100WhileTabla</title>
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
                <th><b>Números pares</b></th>
            </tr>
            <?php
            $num = 0;

            while ($num <= 100) {
                echo "<tr>";
                echo "<td>$num</td>";
                echo "</tr>";
                $num += 2;
            }
            ?>
        </table>
    </body>
</html>