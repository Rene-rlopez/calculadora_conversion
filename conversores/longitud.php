<?php 

$dato = $_POST['input1'];
$inicial = $_POST['inicial'];
$resultado = $_POST['resultado'];

function mm(){
    $mm = 1000;
    return $mm;

}

function cm(){
    $cm = 100;
    return $cm;
}

function pl(){
    $pl = 39.37;
    return $pl;
}

function m(){
    $m = 1;
    return $m;
}

function yrd(){
    $yrd = 1.094;
    return $yrd;
}

function Km(){
    $Km = 0.001;
    return $Km;
}


function convertirAMetros($inicial, $resultado, $dato){
    if($inicial != 'm'){     
        $conversion = $dato / $inicial();
        $total = $resultado() * $conversion;
        return round($total, 2);
    }
    else if($inicial == $resultado){
        return $dato;
    }
    else{
        $total = $resultado() * $dato;
        return round($total, 2);
    }
}

echo "El numero que ingreso en $inicial equivale a: "."<h1>".convertirAMetros($inicial, $resultado, $dato)."$resultado</h1>";

?>