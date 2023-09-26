<?php

interface calcular{
    public function convert($value);
}

class gramoComversion implements calcular{
    public function convert($value) {
        return $value;
    }
}
class kilogramoComversion implements calcular{
    public function convert($value) {
        return $value * 1000; // 1 kilogramo = 1000gramo
    }
}
class libraComversion implements calcular{
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


$gramoComversion = new Gramocomversion();
$kilogramoComversion = new KilogramoComversion();
$libraConversion = new LibraConversion();

//R: 1000 gramos
$caculadora1 = new masaCalculadora($gramoComversion);
echo $caculadora1->calculate(1000, 'gramo');

//R: 2kg 2000 gramos
$caculadora2 = new masaCalculadora($kilogramoComversion);
echo $caculadora1->calculate(2, 'kilogramo');

// R: lb 453.592 gramos
$caculadora3 = new masaCalculadora($librasComversion);
echo $caculadora1->calculate(1, 'libra');

?>