<?php

$conProyecto = null;
try {
    global $conProyecto;
    if ($conProyecto === null) {
        $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto');
    }
} catch (mysqli_sql_exception $e) {
    echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
}
return $conProyecto;
