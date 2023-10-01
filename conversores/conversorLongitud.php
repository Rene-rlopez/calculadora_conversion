<?php 

class CapturaDatos {
    private $cantidadUsuario;
    private  $unidadOrigen; 
    private  $unidadDestino;

    private $unidadesLongitud = [
        'mm' => 1000,
        'cm' => 100,
        'pl' => 39.37,
        'm' => 1,
        'yrd' => 1.94,
        'Km' => 0.001,
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

class ConversorLongitud {

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

/*
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidadUsusario = @$_POST['cantidadUsudario'];
    $unidadOrigen = @$_POST['unidadOrigen'];
    $unidadDestino = $_POST['unidadDestino'];

    $conversor = new Conversor();
    $controller = new ConversorController($conversor);

    try {
        echo "El número que ingresó en $cantidadUsuario equivale a: <h1>" . $controller->convertir($cantidadUsusario, $unidadOrigen, $unidadDestino) . "$unidadDestino</h1>";
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
*/

/*

$capturaDatos = new CapturaDatos();
$capturaDatos->setCantidadUsuario(3);
$capturaDatos->setUnidadOrigen('pl'); 
$capturaDatos->setUnidadDestino('cm'); 

// Crear una instancia de ConversorController y llamar al método convertir
$conversorController = new ConversorController();
$resultado = $conversorController->convertir($capturaDatos);

// Imprimir el resultado
echo $resultado;

*/

?>