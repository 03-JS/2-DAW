<?php

require_once 'E11_interFiguraGeom.php';

class Pentagono implements Figura{
    public $lado;
    public $apotema;
    
    public function __construct($lado, $apotema) {
        $this->lado = $lado;
        $this->apotema = $apotema;
    }

    #[\Override]
    public function calcularArea() {
        return ($this->calcularPerimetro() * $this->apotema) / 2;
    }

    #[\Override]
    public function calcularPerimetro() {
        return $this->lado * 5;
    }
}

?>