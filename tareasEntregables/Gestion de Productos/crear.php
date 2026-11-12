<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="bg-secondary text-white">
    <h1 class="text-center">CREAR PRODUCTO</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <form method="POST" name="crearProducto">
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nombreCorto" class="form-label">Nombre Corto</label>
                            <input type="text" name="nombreCorto" id="nombreCorto" required class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" name="precio" id="precio" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="familia">Familia</label>
                            <select id="familia" name="familia" required class="form-control">
                                <?php
                                $conProyecto = require_once('conexion.php');
                                $stmt = $conProyecto->stmt_init();
                                $stmt = $conProyecto->prepare(
                                    'SELECT cod, nombre FROM familias'
                                );
                                $stmt->bind_result($familiaId, $familiaNombre);
                                $stmt->execute();
                                while ($stmt->fetch()) {
                                    echo "<option value='$familiaId'>$familiaNombre</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success" value="Crear" name="enviar">
                    <input type="reset" class="btn btn-danger" value="Limpiar">
                    <input type="button" class="btn btn-primary" value="Volver"
                        onclick="window.location.href='listado.php'">
                </form>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["enviar"])) {
        try {
            $stmt = $conProyecto->prepare(
                'INSERT INTO productos (nombre, nombre_corto, descripcion, pvp, familia) VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->bind_param("sssis", $_POST["nombre"], $_POST["nombreCorto"], $_POST["descripcion"], $_POST["precio"], $_POST["familia"]);
            $stmt->execute();
            $stmt->close();


        } catch (mysqli_sql_exception $e) {
            echo "<p>Error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } ?>
</body>

</html>