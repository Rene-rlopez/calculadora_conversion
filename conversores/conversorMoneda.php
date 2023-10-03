<?php

$url = "https://v6.exchangerate-api.com/v6/1d7f897344eba1851e50c933/latest/USD"; // URL de la API

$response = file_get_contents($url); // Recupera el contenido de la URL

if ($response === FALSE) {
    die('Error al recuperar datos de la API');
}

$data = json_decode($response, true); // Decodifica JSON a arreglo asociativo de PHP


/*
echo $data['conversion_rates']['USD'];
echo $data['conversion_rates']['CAD'];
echo $data['conversion_rates']['AUD'];
echo $data['conversion_rates']['EUR'];
echo $data['conversion_rates']['GBP'];
echo $data['conversion_rates']['CHF'];

*/

class CapturaDatos {
    private $url = "https://v6.exchangerate-api.com/v6/1d7f897344eba1851e50c933/latest/USD";
    private $data;
    private $cantidadUsuario;
    private $unidadOrigen; 
    private $unidadDestino;

    public function __construct() {
        $this->obtenerDatosAPI();
    }

    private function obtenerDatosAPI(){
        $response = file_get_contents($this->url);
        
        if ($response === FALSE) {
            die('Error al obtener datos de la API');
        }

        $this->data = json_decode($response, true);
    }
    
    public function getData() {
        return $this->data;
    }

    public function setCantidadUsuario($cantidadUsuario){
        $this->cantidadUsuario = $cantidadUsuario;
    }

    public function setUnidadOrigen($unidadOrigen) {
        $this->unidadOrigen = $unidadOrigen;
    }

    public function setUnidadDestino($unidadDestino) {
        $this->unidadDestino = $unidadDestino;
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

class ConversorMoneda {

    public function convertir(CapturaDatos $capturaDatos){

        $cantidadUsuario = $capturaDatos->getCantidadUsuario();
        $unidadOrigen = $capturaDatos->getUnidadOrigen();
        $unidadDestino = $capturaDatos->getUnidadDestino();
        $data = $capturaDatos->getData();

        if($unidadOrigen != 1){     
            $unidadBase = $cantidadUsuario / $data['conversion_rates'][$unidadOrigen];
            $total = $unidadBase * $data['conversion_rates'][$unidadDestino];
            return round($total, 2);
        }
        else if($unidadOrigen == $unidadDestino){
            return $cantidadUsuario;
        }
        else{
            $total = $data['conversion_rates'][$unidadDestino] * $cantidadUsuario;
            return round($total, 2);
        }
    }
}

?> 