<?php

class E12_areaTrianguloArr
{
    public function AreaTriangulo($bases, $alturas)
    {
        for ($i = 0; $i < count($bases); $i++) {
            try {
                if ($bases[$i] < 0 || $alturas[$i] < 0) { 
                    throw new Exception("Ha habido una excepción: Debes insertar un número positivo<br>");
                }
                echo "El área del triangulo de base " . $bases[$i] . " y altura " . $alturas[$i] . " es: " . ($bases[$i] * $alturas[$i]) / 2;
                echo "<br>";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}

?>