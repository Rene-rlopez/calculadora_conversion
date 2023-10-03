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
        'mg' => 1000,
        'g' => 1,
        'kg' => 0.001,
        'lb' => 0.00220462,
        'oz' => 0.035274,
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

class ConversorMasa {

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