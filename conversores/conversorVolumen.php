<?php

interface calcular{
    public function convert($value);
}

class litrosConversion implements calcular {
    public function convert($value){
        return $value;
    }
}

class mililitrosConversion implements calcular {
    public function convert($value){
        return $value * 0.001; // 1 litro = 1000 millilitros
    }
}

class galonesConversion implements calcular {
    public function convert($value){
        return $value * 3.78541; // 1 galon = 3.78541 litros
    }
}

class volumenCalculadora {
    private $converter;

    public function __contruct(calcular $converter) {
        $this->converter = $converter;
    }

    public function calculate($value, $unit) {
        return $this->converter->conver($value) . "" . $this; 
    }
}

$litrosConversion = new litrosConversion();
$mililitrosConversion = new mililitrosConversion();
$galonesConversion = new galonesConversion();

// R: 2 litros
$calculadora1 = new volumenCalculadora($litrosConversion);
echo $calculadora1->calculate(2, 'litros');
//R: 0.5 litros
$calculadora2 = new volumenCalculadora($mililitrosConversion);
echo $calculadora1->calculate(500, 'mililitros');
//R: 3.78541 lotros
$calculadora3 = new volumenCalculadora($galonesConversion);
echo $calculadora1->calculate(1, 'galones');

?>