<?php
try {
    // Establecemos la conexión
    $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

    $conProyecto->autocommit(false);

    // Ejecutamos la consulta
    $resultado = $conProyecto->query('UPDATE stocks SET unidades=1 WHERE producto=1 AND tienda=1 ');
    $resultado = $conProyecto->query('UPDATE stocks SET unidades=1 WHERE producto=1 AND tienda=3 ');

    $conProyecto->commit();

    // Cerramos la conexión
    $conProyecto->close();

} catch (mysqli_sql_exception $e) {
    echo "<p>Error en la base de datos: "
        . htmlspecialchars($e->getMessage()) . "</p>";
    $conProyecto->rollback();
}
?>