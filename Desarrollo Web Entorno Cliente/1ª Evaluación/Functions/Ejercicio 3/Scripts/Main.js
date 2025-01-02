function MostrarMenu() {
    let input;
    let menu = "Opciones:\n";
    str += "1 - Agregar producto\n";
    str += "2 - Eliminar producto\n";
    str += "3 - Actualizar producto\n";
    str += "4 - Mostrar inventario\n";
    str += "5 - Calcular valor total\n";
    str += "0 - Salir";
    do {
        alert(menu);
        input = prompt("Elige una opción");
        switch (Number.parseInt(input)) {
            case 1:

                break;
            case 2:

                break;
            case 3:

                break;
            case 4:

                break;
            case 5:

                break;
            default:
                break;
        }
    } while (input != 0);
}

MostrarMenu();