<?php
try {
    // 1. Establecemos la conexión
    $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
    // 2. Ejecutamos la consulta SQL
    $sql = "SELECT producto, unidades FROM stocks WHERE unidades < 2";
    $resultado = $conProyecto->query($sql);
    // 3. Recuperamos el primer registro como objeto
    $stock = $resultado->fetch_assoc();
    // 4. Recorremos los registros obtenidos
    while ($stock != null) {
        echo "<p>Producto $stock[producto]: $stock[unidades] unidades.</p>";
        // Recuperamos el siguiente registro
        $stock = $resultado->fetch_assoc();
    }
    // 5. Liberamos los resultados
    $resultado->free();
} catch (mysqli_sql_exception $e) {
    echo "<p>Error en la consulta: "
        . htmlspecialchars($e->getMessage()) . "</p>";
} finally {
    // 6. Cerramos la conexión
    if (isset($conProyecto)) {
        $conProyecto->close();
    }
}
?>