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
            <?php
            include ("E4_varsFrutas.php");

            echo "
        <tr>
            <th><b>Variable</b></th>
            <th><b>Valor</b></th>
        </tr>
        <tr>
            <td>Fruta</td>
            <td>$fruta</td>
        </tr>
        <tr>
            <td>Tamaño</td>
            <td>$tamano</td>
        </tr>
        <tr>
            <td>Color</td>
            <td>$color</td>
        </tr>
        <tr>
            <td>Posición</td>
            <td>$pos</td>
        </tr>";
            ?>
        </table>
    </body>
</html>