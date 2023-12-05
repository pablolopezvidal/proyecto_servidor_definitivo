<?php
class Producto {
    public $productoID;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    public $categoria;
    public $fotos;
    public $tipo;

    public function __construct($productoID, $nombre, $descripcion, $precio, $categoria, $fotos, $tipo) {
        $this->productoID = $productoID;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->fotos = $fotos;
        $this->tipo = $tipo;

    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}
?>