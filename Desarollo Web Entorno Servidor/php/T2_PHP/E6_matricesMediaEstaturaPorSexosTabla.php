<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        $data = array(
            array(172, 165, 179, 163, 170, 174),
            array("H", "M", "H", "M", "M", "H")
        );

        $numHombres = 0;
        $numMujeres = 0;
        $sumaAltHombres = 0;
        $sumaAltMujeres = 0;
        
        for ($i = 0; $i < count($data); $i++) {
                for ($j = 0; $j < count($data[$i]); $j++) {
                    if ($i == 0) {
                        if ($data[$i + 1][$j] == "M") {
                            $sumaAltMujeres += $data[$i][$j];
                        } else if ($data[$i + 1][$j] == "H") {
                            $sumaAltHombres += $data[$i][$j];
                        }
                    } else {
                        if ($data[$i][$j] == "M") {
                            $numMujeres++;
                        } else if ($data[$i][$j] == "H") {
                            $numHombres++;
                        }
                    }
                }
            }
        ?>
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
            
            <?php
            
            echo "Contenido de la matriz";
            echo "<br>";
            echo "======================";
            
            for ($i = 0; $i < count($data); $i++) {
                echo "<tr>";
                echo $i == 0 ? "<td>Altura</td>" : "<td>Sexo</td>";
                for ($j = 0; $j < count($data[$i]); $j++) {
                    echo "<td>";
                    echo $data[$i][$j];
                    echo "</td>";
                }
                echo "</tr>";
            }
            
            ?>
        </table>
        <table>
            <tr>
                <th></th>
                <th>Mujeres</th>
                <th>Hombres</th>
            </tr>
            <?php
            echo "<br>";
            echo "Tabla Resultado";
            echo "<br>";
            echo "======================";
            ?>
            <tr>
                <td><b>Número</b></td>
                <td><?php echo $numMujeres?></td>
                <td><?php echo $numHombres?></td>
            </tr>
            <tr>
                <td><b>Suma Alturas</b></td>
                <td><?php echo $sumaAltMujeres?></td>
                <td><?php echo $sumaAltHombres?></td>
            </tr>
            <tr>
                <td><b>Media Alturas</b></td>
                <td><?php echo $sumaAltMujeres / $numMujeres?></td>
                <td><?php echo $sumaAltHombres / $numHombres?></td>
            </tr>
        </table>
    </body>
</html>