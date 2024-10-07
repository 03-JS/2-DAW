<?php

require_once 'E11_interFiguraGeom.php';

class Cuadrado implements Figura{
    public $lado;
    
    public function __construct($lado) {
        $this->lado = $lado;
    }

    #[\Override]
    public function calcularArea() {
        return $this->lado * $this->lado;
    }

    #[\Override]
    public function calcularPerimetro() {
        return $this->lado * 4;
    }
}

?>