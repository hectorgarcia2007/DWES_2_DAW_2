<?php
try {
    // Establecemos la conexión
    $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');

    // Ejecutamos la consulta
    $resultado = $conProyecto->query('SELECT * FROM stocks');

    // Mostramos los registros eliminados
    echo "<p>Se han mostrado $conProyecto->affected_rows registros.</p>";

    // Cerramos la conexión
    $conProyecto->close();

} catch (mysqli_sql_exception $e) {
    echo "<p>Error en la base de datos: "
        . htmlspecialchars($e->getMessage()) . "</p>";
}
?>