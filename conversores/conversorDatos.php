<?php 

class CapturaDatos {
    private $cantidadUsuario;
    private  $unidadOrigen; 
    private  $unidadDestino;

    private $unidadesLongitud = [
        'byte' => 1073741824,
        'KB' => 1048576,
        'MB' => 1024,
        'GB' => 1,
        'TB' => 0.00097656,
    ];

    public function setCantidadUsuario($cantidadUsuario){
        $this->cantidadUsuario = $cantidadUsuario;
    }

    public function setUnidadOrigen($unidadOrigen) {
        $this->unidadOrigen = $this->unidadesLongitud[$unidadOrigen];
    }

    public function setUnidadDestino($unidadDestino) {
        $this->unidadDestino = $this->unidadesLongitud[$unidadDestino];
    }

    public function getCantidadUsuario(){
        return $this->cantidadUsuario;
    }

    public function getUnidadOrigen() {
        return $this->unidadOrigen;
    }

    public function getUnidadDestino() {
        return $this->unidadDestino;
    }
}

class ConversorDatos {

    public function convertir(CapturaDatos $capturaDatos){

        $cantidadUsuario = $capturaDatos->getCantidadUsuario();
        $unidadOrigen = $capturaDatos->getUnidadOrigen();
        $unidadDestino = $capturaDatos->getUnidadDestino();

        if($unidadOrigen != 1){     
            $unidadBase = $cantidadUsuario / $unidadOrigen;
            $total = $unidadBase * $unidadDestino;
            return round($total, 2);
        }
        else if($unidadOrigen == $unidadDestino){
            return $cantidadUsuario;
        }
        else{
            $total = $unidadDestino * $cantidadUsuario;
            return round($total, 2);
        }
    }

}

?>