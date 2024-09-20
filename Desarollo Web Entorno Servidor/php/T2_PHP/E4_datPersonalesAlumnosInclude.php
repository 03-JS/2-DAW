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
                <th colspan="2"><b>Datos Personales</b></th>
            </tr>
            <?php
            include ("E4_datPersonalesAlumnos.php");

            echo "<tr>
                <td>Nombre</td>
                <td>$nombre</td>
            </tr>";

            echo "<tr>
                <td>Apellidos</td>
                <td>$apellidos</td>
            </tr>";

            echo "<tr>
                <td>Edad:</td>
                <td>$edad</td>
            </tr>";

            echo "<tr>
                <td>Teléfono móvil</td>
                <td>$tlf</td>
            </tr>";

            echo "<tr>
                <th colspan='2'><b>===========</b></th>
            </tr>";
            
            echo "<tr>
                <td>Nombre</td>
                <td>$nombre1</td>
            </tr>";

            echo "<tr>
                <td>Apellidos</td>
                <td>$apellidos1</td>
            </tr>";

            echo "<tr>
                <td>Edad</td>
                <td>$edad1</td>
            </tr>";

            echo "<tr>
                <td>Teléfono móvil</td>
                <td>$tlf1</td>
            </tr>";
            
            echo "<tr>
                <th colspan='2'><b>===========</b></th>
            </tr>";
            ?>
        </table>
    </body>
</html>