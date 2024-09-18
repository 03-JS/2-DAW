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
        <?php
        $a = 50;
        $b = 5;

        $i = 0;
        $suma = 0;

        if ($a < 0 || $b < 0) {
            echo "<b>No podemos usar números negativos</b>";
            echo "<br><br><br>";
        }

        if ($a < 0 && $b < 0) {
            echo "<b>Has puesto A y B negativos</b>";
            echo "<br>";
        } else if ($a < 0) {
            echo "<b>Has puesto A negativo";
            echo "<br>";
        } else if ($b < 0) {
            echo "<b>Has puesto B negativo";
            echo "<br>";
        }

        echo "<b>VALORES INTRODUCIDOS</b>";
        echo "<br>";
        echo "<b>A = $a</b>";
        echo "<br>";
        echo "<b>B = $b</b>";

        if ($a > $b) {
            $c = $a;
            $a = $b;
            $b = $c;
            echo "<br><br>";
            echo "Se han intercambiado A y B";
            echo "<br><br>";
            echo "Nuevos valores:<br>";
            echo "<b>A = $a</b>";
            echo "<br>";
            echo "<b>B = $b</b>";
        }
        
        if ($a >= 0 && $b >= 0) {
            echo "
        <table>
        <tr>
        <th><b>Listado de Múltiplos</b></th>
        <th><b>Suma Acumulada</b></th>
        </tr>";
            while ($a <= $b) {
                $suma += $a;
                echo "<tr>";
                echo "<td>$a</td>";
                echo "<td>$suma</td>";
                echo "</tr>";
                $a += 5;
                $i++;
            }
            echo "<br><br>";
            echo "<tr>";
            echo "<td colspan = '2'><b>Múltiplos generados: $i</b></td>";
            echo "</tr>";
            echo"</table>";
        }
        ?>
    </body>
</html>