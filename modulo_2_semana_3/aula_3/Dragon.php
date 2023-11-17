<?php 
require_once 'Enemy.php';

class Dragon extends Enemy{

    private $power;

    public function atacar() {
        echo "Atacando com fogo";
    }
}

?>