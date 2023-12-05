<?php
class Servicio {
    public $servicioID;
    protected $nombre;
    protected $descripcion;
    protected $precio;
    public $fotos;
    public $tipo;

    public function __construct($servicioID, $nombre, $descripcion, $precio, $fotos, $tipo) {
        $this->servicioID = $servicioID;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->fotos = $fotos;
        $this->tipo = $tipo;

    }

    public function __get($atributo) {
        return $this->$atributo;
    }
}
?>