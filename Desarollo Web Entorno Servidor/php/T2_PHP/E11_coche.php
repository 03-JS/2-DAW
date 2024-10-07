<?php

class Coche {
    public $marca;
    public $modelo;
    public $hp;
    public $pvp;
    
    public function __construct($marca, $modelo, $hp, $pvp) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->hp = $hp;
        $this->pvp = $pvp;
    }
}

?>