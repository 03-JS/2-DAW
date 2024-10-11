<?php

class E12_areaTriaExMult
{
    public function AreaTriangulo($base, $altura)
    {
        try {
            if ($base < 0) {
                throw new Exception("Base negativa: $base");
            }
            if ($altura < 0) {
                throw new Exception("Altura negativa: $altura");
            }
            if ($base > 2000 || $altura > 5000) {
                throw new Exception("Base o Altura fuera de los límites superiores<br>Base: $base<br>Altura: $altura");
            }
            echo "<b>ÁREA del TRIÁNGULO de base $base y altura $altura = " . ($base * $altura) / 2 . "</b>";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

?>