<!doctype html>
<html lang="es">

<?php
$usuarios = array();
function almacenarUsuarios($n, $t)
{
    global $usuarios;
    switch (cualTipo($n, $t)) {
        case 0:
            $usuarios[$n] = $t;
            break;
        case 1:
            $usuarios[$n] = $t;
            break;
        case 2:
            unset($usuarios[$n]);
            break;
    }
}
function cualTipo($n, $t)
{
    global $usuarios;
    if (yaEstaAlmacenadaLlave($usuarios, $n)) {
        if (!$t == "") {
            return 1;
        } else {
            return 2;
        }
    } else {
        return 0;
    }
}

function yaEstaAlmacenadaLlave($array, $elemento)
{
    foreach ($array as $llave => $v) {
        if ($llave == $elemento) {
            return true;
        }
    }
    return false;
}
?>

<head>
    <meta charset="UTF
-8">
    <meta name="viewport" content="width=device
-width,
 user
-scalable=no,
 initial
-scale=1.0,
 maximum
-scale=1.0,
 minimum
-scale=1.0">
    <meta http -equiv="X
-UA
-Compatible" content="ie=edge">
    <title>Formularios</title>
</head>

<body style="background: gainsboro">
    <?php
    if (isset($_POST["enviar"])) {

        $usuarios = (unserialize(base64_decode($_POST["cantidad"])));

        almacenarUsuarios(trim($_POST["nombre"]), trim($_POST["telefono"]));

        ?>
        <fieldset style="width:40%; margin:auto">
            <legend style="font-weight: bold">Datos Agenda</legend>
            <?php
            echo "<ol>";
            foreach ($usuarios as $k => $v) { //los recorremos y mostramos
                echo "<li>$k - $v</li>";
            }
            echo "</ol>";
            ?>
        </fieldset>


    <?php
    } ?>

    <fieldset style="width:40%; margin:auto">
        <legend style="font-weight: bold">Nuevo Contacto</legend>
        <form name="formContacto" action="<?php echo $_SERVER['PHP_SELF']; ?>" ENCTYPE="multipart/form-data"
            method="POST">
            <p>
                <label for="n">Nombre:</label>
                <input type="text" name="nombre" place holder="Nombre" id="n" required>
            </p>
            <p>
                <label for="a">Telefono:</label>
                <input type="number" name="telefono" id="t">
            </p>

            <input type='hidden' name="cantidad" value="<?php
            echo base64_encode(serialize($usuarios)) ?>">
            <div style="text-align: center; margin-top: 5px">
                <input type="submit" value="Enviar" name="enviar">
                &nbsp;&nbsp;
                <input type="reset" value="Limpiar">
            </div>
        </form>
    </fieldset>

    <?php
    if (isset($_POST["enviar"])) {
        ?>
        <fieldset style="width:40%; margin:auto">

            <legend style="font-weight: bold">Vaciar Agenda</legend>
            <form action="agenda.php" method="POST">
                <input type="submit" value="Vaciar Todo" name="vaciarTodo">
            </form>
        </fieldset>
    <?php } ?>





    </fieldset>
</body>

</html>