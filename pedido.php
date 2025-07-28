<?php
class Pedido {
    public $descripcion;
    public $tipo;
    public $producto;
    public $unidades;
    public $observaciones;

    public function __construct($descripcion, $tipo, $producto, $unidades, $observaciones) {
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->producto = $producto;
        $this->unidades = $unidades;
        $this->observaciones = $observaciones;
    }

    public function resumen() {
        return "Pedido de {$this->unidades} unidad(es) de '{$this->producto}' ({$this->tipo}) - {$this->descripcion}. Observaciones: {$this->observaciones}";
    }

    public function buscarPorProducto($nombreProducto) {
        return stripos($this->producto, $nombreProducto) !== false;
    }
}
?>