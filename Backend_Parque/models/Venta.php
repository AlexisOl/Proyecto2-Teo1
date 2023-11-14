<?php

class Venta {

    public $idVenta;
    public $horas;
    public $idArea;
    public $montoParcial;
    public $descripcion;
    public $idFactura;
    public $fecha;
    public $horainicial;
    public $horafinal;


    public function __construct($id,$horas,$idArea,$montoParcial,$descripcion,$idFactura,$fecha,$horainicial,$horafinal) {
        $this->idVenta = $id;   
        $this->horas = $horas;   
        $this->idArea = $idArea;   
        $this->montoParcial = $montoParcial;   
        $this->descripcion = $descripcion;   
        $this->idFactura = $idFactura;   
        $this->fecha = $fecha;   
        $this->horainicial = $horainicial;   
        $this->horafinal = $horafinal;   
    }



}

?>






