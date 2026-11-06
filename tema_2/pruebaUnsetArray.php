<?php
$prueba = ["A", "B", "C"];
echo "\$prueba[0] antes del unset: ";
echo $prueba[0];
echo "<br/>";
echo "\$prueba[0] despues del unset: ";
unset($prueba[0]);
echo $prueba[0];
echo "<br/>";
echo "\$prueba[0] despues de volver a introducir algo: ";
$prueba[0] = "D";
echo $prueba[0];
echo "<br/>";
print_r(array_values($prueba));
?>