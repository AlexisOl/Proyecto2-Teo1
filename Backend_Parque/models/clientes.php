<?php
class clientes
{
    private $nombre;
    private $nit;
    private $estado;
    private $ubicacion;
    private $id;

    public function __construct($nombre, $nit, $estado, $ubicacion, $id)
    {
        $this->nombre = $nombre;
        $this->nit = $nit;
        $this->estado = $estado;
        $this->ubicacion = $ubicacion;
        $this->id = $id;
        
                   
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getNit(){
        return $this->nit;
    }

    public function getEstado(){
        return $this->estado;
    }


    public function getUbicacion(){
        return $this->ubicacion;
    }
}

?>