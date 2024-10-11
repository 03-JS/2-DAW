<?php

class E12_areaTrianguloTrataEx
{
    public function AreaTriangulo($base, $altura)
    {
        try {
            if ($base < 0 || $altura < 0) {
                throw new Exception("Uno de los parámetros introducidos es negativo");
            }
            echo "<b>ÁREA del TRIÁNGULO de base $base y altura $altura = " . ($base * $altura) / 2 . "</b>";
        } catch (Exception $e) {
            echo "Excepción capturada:<br>";
            echo "Debes insertar un número positivo";
        }
    }
}

?>