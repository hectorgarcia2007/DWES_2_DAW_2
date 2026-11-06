<?php
$conProyecto = null;
function iniciarConexion()
{
    // Conectamos a la base de datos
    global $conProyecto;
    $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
    return $conProyecto;

}

?>