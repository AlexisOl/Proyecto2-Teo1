<?php

class Comentarios {

    public $idComentario;
    public $idFactura;
    public $mensaje;
    public $fecha;
    
    public function __construct($id,$idFactura,$mensaje,$fecha) {
        $this->idComentario = $id;   
        $this->idFactura = $idFactura;   
        $this->mensaje = $mensaje;   
        $this->fecha = $fecha;   

    }

    public function obtenerIdComentario() {
        return $this->idComentario;
    }

    public function obtenerIdFactura() {
        return $this->idFactura;
    }

    public function obtenerMensaje(){
        return $this->mensaje;
    }

    public function obtenerFecha(){
        return $this->fecha;
    }

}

?>
