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
                <th>Posición</th>
                <th>Valor</th>
            </tr>
            <?php
            $arr = range(100, 500, 100);
            $suma = 0;
            for ($i = 0; $i < count($arr); $i++) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$arr[$i]</td>";
                $suma += $arr[$i];
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td><b>SUMA</b></td>";
            echo "<td><b>$suma</b></td>";
            echo "</tr>";
            $media = $suma / count($arr);
            echo "<tr>";
            echo "<td><b>MEDIA</b></td>";
            echo "<td><b>$media</b></td>";
            echo "</tr>";
            ?>
        </table>
    </body>
</html>