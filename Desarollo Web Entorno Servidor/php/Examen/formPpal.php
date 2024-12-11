<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Ppal</title>
    <style>
        table, th, td {
            text-align: center;
            border: 1px solid black;
            width: 25%
        }
    </style>
</head>
<body>
    <form action="ppal.php" method="post">
        <table>
            <tr>
                <td><b>Usuario</b></td>
                <td><b>Contraseña</b></td>
                <td><b>Tipo User</b></td>
            </tr>
            <tr>
                <td>
                    <select name="user">
                        <option value="user1">user1</option>
                        <option value="user2">user2</option>
                        <option value="user3">user3</option>
                    </select>
                </td>
                <td>
                    <select name="passwd">
                        <option value="pass1">pass1</option>
                        <option value="pass2">pass2</option>
                        <option value="pass3">pass3</option>
                    </select>
                </td>
                <td>
                    <select name="type">
                        <option value="tipo1">tipo1</option>
                        <option value="tipo2">tipo2</option>
                        <option value="tipo3">tipo3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <button name="enviar">Enviar</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>