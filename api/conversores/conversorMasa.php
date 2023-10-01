<?php

interface calcular{
    public function convert($value);
}

class GramoConversion implements calcular{
    public function convert($value) {
        return $value;
    }
}
class KilogramoConversion implements calcular{
    public function convert($value) {
        return $value * 1000; // 1 kilogramo = 1000gramo
    }
}
class LibraConversion implements calcular{
    public function convert($value) {
        return $value * 453.592; // 1 libra = 453.592 gramos
    }
}


class masaCalculadora{
    private $converter;
    public function __construct(calcular $converter) {
        $this->converter = $converter;
    }

    public function calculate($value, $unit) {
        return $this->converter->convert($value) . " " . $unit;
    }
}


$gramoConversion = new GramoConversion();
$kilogramoConversion = new KilogramoConversion();
$libraConversion = new LibraConversion();

//R: 1000 gramos
$calculadora1 = new masaCalculadora($gramoConversion);
echo $calculadora1->calculate(1000, 'gramo<br>');


//R: 2kg 2000 gramos
$calculadora2 = new masaCalculadora($kilogramoConversion);
echo $calculadora1->calculate(2, 'kilogramo<br>');



// R: lb 453.592 gramos
$calculadora3 = new masaCalculadora($libraConversion);
echo $calculadora1->calculate(1, 'libra<br>');

?>