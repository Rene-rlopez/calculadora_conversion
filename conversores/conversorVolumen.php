<?php 

interface DatosConversion {
    public function getCantidadUsuario();
    public function getUnidadOrigen();
    public function getUnidadDestino();
}

class CapturaDatos implements DatosConversion{
    private $cantidadUsuario;
    private  $unidadOrigen; 
    private  $unidadDestino;

    private $unidadesLongitud = [
        'mL' => 1000,
        'L' => 1,
        'gal' => 0.264172,
        'pt' => 2.11338,
        'fl oz' => 33.814,
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

class ConversorVolumen {

    public function convertir(DatosConversion $capturaDatos){

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