<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="p-3 mb-2 bg-info bg-info-subtle text-info-emphasis">

    <div>
        <h1 class="text-center">Gestión de Productos</h1>
    </div>
    <input type="button" class="btn btn-primary" value="Crear Producto" onclick="window.location.href='crear.php'">
    <br>
    <table class="row justify-content-center table table-striped table-bordered table-hover table-light d-flex">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>

        <?php
        $conProyecto = require_once('conexion.php');
        $stmt = $conProyecto->stmt_init();
        $stmt = $conProyecto->prepare(
            'SELECT id, nombre FROM productos'
        );
        $stmt->bind_result($productoId, $productoNombre);


        $stmt->execute();
        // Mostramos los resultados
        while ($stmt->fetch()) {
            echo "<tr>";
            echo "<td>$productoId</td>";
            echo "<td>$productoNombre</td>";
            echo "<td><form action='borrar.php' method='POST'>";
            echo "<input type='hidden' name='id' value='$productoId'>";
            echo "<input type='submit' class='btn btn-danger' value='Eliminar'>";
            echo "</form></td>";
            echo "</tr>";
        }

        ?>

    </table>
</body>

</html>