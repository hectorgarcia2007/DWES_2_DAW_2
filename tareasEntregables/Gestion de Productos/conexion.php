<?php
$conProyecto = null;
global $conProyecto;
if ($conProyecto === null) {
    $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
}

return $conProyecto;
?>