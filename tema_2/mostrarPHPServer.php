<?php
echo "<table border=2>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Valor</th>";
echo "</tr>";
foreach ($_SERVER as $clave => $valor) {
    echo "<tr>";
    echo "<td>$clave</td>";
    echo "<td>$valor</td>";
    echo "</tr>";
}
echo "</table>";
?>