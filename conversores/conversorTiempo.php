<?php 

class CapturaDatos {
    private $cantidadUsuario;
    private  $unidadOrigen; 
    private  $unidadDestino;

    private $unidadesLongitud = [
        's' => 86400,
        'min' => 1440,
        'h' => 24,
        'dia' => 1,
        'semana' => 0.142857,
        'mes' => 0.0328767,
        'año' => 0.00273973,
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

class ConversorTiempo {

    public function convertir(CapturaDatos $capturaDatos){

        $cantidadUsuario = $capturaDatos->getCantidadUsuario();
        $unidadOrigen = $capturaDatos->getUnidadOrigen();
        $unidadDestino = $capturaDatos->getUnidadDestino();

        if($unidadOrigen != 1){     
            $unidadBase = $cantidadUsuario / $unidadOrigen;
            $total = $unidadBase * $unidadDestino;
            return round($total, 3);
        }
        else if($unidadOrigen == $unidadDestino){
            return $cantidadUsuario;
        }
        else{
            $total = $unidadDestino * $cantidadUsuario;
            return round($total, 3);
        }
    }

}

?>