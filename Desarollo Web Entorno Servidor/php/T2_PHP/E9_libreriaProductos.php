<?php

function Producto($multiplicando, $multiplicador) {
    return $multiplicando * $multiplicador;
}

function ProductoValores() {
    $producto = 1;
    for ($i = 0; $i < func_num_args(); $i++) {
        $producto *= func_get_arg($i);
    }
    return $producto;
}

?>