<?php

require_once 'E11_cochePadre.php';

class CocheHijo extends Coche {
    public $color; // string
    public $extras; // array de strings
    
    public function __construct($marca, $modelo, $hp, $pvp, $color, $extras) {
        parent::__construct($marca, $modelo, $hp, $pvp);
        $this->color = $color;
        $this->extras = $extras;
    }
    
    public function mostrarColor() {
        echo "<h3>" . $this->color . "</h3>";
    }
    
    public function mostrarExtras() {
        echo "<ul>";
        for ($i = 0; $i < count($this->extras); $i++) {
            echo "<li>" . $this->extras[$i] . "</li>";
        }
        echo "</ul>";
    }
}

?>