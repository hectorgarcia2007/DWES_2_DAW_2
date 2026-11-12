<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_POST['id'])) {
        try {

            $conProyecto = require_once('conexion.php');
            $stmt = $conProyecto->prepare('DELETE FROM productos WHERE id = ?');
            $id = $_POST['id'];
            $stmt->bind_param('i', $id);
            $stmt->execute();

            echo "<p>Producto de Código " . $id . " Borrado correctamente.</p>";
        } catch (mysqli_sql_exception $e) {
            echo "<p>Error al eliminar el producto: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
    ?>
    <input type="button" class="btn btn-primary" value="Volver" onclick="window.location.href='listado.php'">
</body>

</html>