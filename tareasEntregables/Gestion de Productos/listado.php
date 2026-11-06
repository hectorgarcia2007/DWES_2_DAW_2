<?php $conProyecto = new mysqli('localhost', 'gestor', 'secreto', 'proyecto'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Gestión de Productos</h1>

    <table>
        <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Acciones</th>
        </tr>

        <?php
        $stmt = $conProyecto->stmt_init();
        $stmt = $conProyecto->prepare(
            'SELECT id, nombre FROM productos'
        );
        $stmt->bind_result($producto, $unidades);


        $stmt->execute();
        // Mostramos los resultados
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "`<td>$producto</td>`";
            echo "`<td>$unidades</td>`";
            echo "<td> <input type='button' value='Eliminar'> </td>";
            echo "</tr>";
        }

        ?>

    </table>
</body>

</html>