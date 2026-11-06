<?php
$prueba[0] = "a";
$prueba[1] = "b";
$prueba[9] = "c";
$prueba[] = "d";

foreach ($prueba as $k => $v) {
    echo $v;
}
?>