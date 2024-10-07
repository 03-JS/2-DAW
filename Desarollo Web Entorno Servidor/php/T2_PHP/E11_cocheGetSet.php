<?php

class Coche {
    public $marca;
    public $modelo;
    public $hp;
    public $pvp;
    
    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getHp() {
        return $this->hp;
    }

    public function getPvp() {
        return $this->pvp;
    }

    public function setMarca($marca): void {
        $this->marca = $marca;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function setHp($hp): void {
        $this->hp = $hp;
    }

    public function setPvp($pvp): void {
        $this->pvp = $pvp;
    }
}

?>