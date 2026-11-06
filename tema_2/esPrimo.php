<?php
function mostrarPrimo($inicio, $cantidad)
{
    if ($cantidad == null) {
        $cantidad = 10;
    }
    $indexCantidad = 0;
    for ($i = $inicio; $indexCantidad < $cantidad; $i++) {
        if (esPrimo($i)) {
            echo $i . " ";
            $indexCantidad++;
        }
    }
}


function esPrimo($numero)
{
    for ($j = 2; $j < $numero; $j++) {
        if ($numero % $j == 0) {
            return false;
        }
    }
    return true;
}

mostrarPrimo(1, 10);

?>