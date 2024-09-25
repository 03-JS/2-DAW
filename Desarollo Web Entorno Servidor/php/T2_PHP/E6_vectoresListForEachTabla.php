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
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
            <?php
            $personas = array(
                "Luís" => "López",
                "Ana" => "García",
                "Sergio" => "Pérez",
                "Héctor" => "Sánchez",
                "Adrián" => "Sala"
            );

            foreach ($personas as $nombre => $apellido) {
                echo "<tr>";
                echo "<td>$nombre</td>";
                echo "<td>$apellido</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>