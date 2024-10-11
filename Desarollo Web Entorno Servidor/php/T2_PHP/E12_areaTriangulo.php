<?php

class E12_areaTriangulo
{
    public function AreaTriangulo($base, $altura)
    {
        if ($base < 0 || $altura < 0) {
            throw new Exception("Uno de los parámetros introducidos es negativo");
        }
        return ($base * $altura) / 2;
    }
}

?>