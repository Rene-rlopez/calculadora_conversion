<?php

interface calcular{
    public function convert($value);
}

class segundosConversion implements calcular{
    public function convert($value) {
        return $value; 
    }
}
class minutosConversion implements calcular{
    public function convert($value) {
        return $value * 60; // 1 minuto = 60 segundos
    }
}
class horasConversion implements calcular{
    public function convert($value) {
        return $value * 3600; // 1 horas = 3600 segundos
    }
}

class tiempoCalculadora {
    private $converter;

    public function __construct(calcular $converter) {
        $this->converter = $converter;
    }

    public function calculate($value, $unit){
        return $this->converter->convert($value) . "" . $unit;
    }
}

$segundosConversion = new segundosConversion();
$minutosConversion = new minutosConversion();
$horasConversion = new horasConversion();

$calculadora1 = new tiempoCalculadora($segundosConversion);
echo $calculadora1->calculate(120, 'segundos');

$calculadora2 = new tiempoCalculadora($minutosdosConversion);
echo $calculadora1->calculate(2, 'minutos');

$calculadora3 = new tiempoCalculadora($horasdosConversion);
echo $calculadora1->calculate(1, 'horas');

?>