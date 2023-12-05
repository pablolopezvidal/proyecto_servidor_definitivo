<?php

class carrito {
    
    public $carritosId;
    protected $usuarioId;
    //protected $items; // Missing semicolon here

    public function __construct($carritosId, $usuarioId) {
        $this->carritosId = $carritosId;
        $this->usuarioId = $usuarioId;
        //$this->items = [];
    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}
?>

