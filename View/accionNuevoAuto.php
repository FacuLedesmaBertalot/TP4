<?php
require_once "../Utils/funciones.php";
require_once "../Controllers/PersonaControl.php";
require_once "../Controllers/AutoControl.php";

$datos = dataSubmited();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Registro Auto</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">

<?php
// Verificar si el dueño existe
$persona = PersonaControl::buscarPorDni($datos['dniDuenio']);

if (!$persona) {
    echo "<div class='alert alert-danger'>
            No existe una persona con DNI <strong>{$datos['dniDuenio']}</strong>.<br>
            <a href='NuevaPersona.php' class='btn btn-sm btn-primary mt-2'>Registrar nueva persona</a>
          </div>";
    exit;
}

// Registrar el auto
$auto = new AutoControl();
$auto->setPatente($datos['patente']);
$auto->setMarca($datos['marca']);
$auto->setModelo($datos['modelo']);
$auto->setDniDuenio($datos['dniDuenio']);

$resultado = $auto->insertarControl();

if (is_array($resultado) && isset($resultado['error'])) {
    echo "<div class='alert alert-danger'>
            <strong>Error:</strong><br>" . implode("<br>", $resultado['error']) . "
          </div>";
} elseif ($resultado) {
    echo "<div class='alert alert-success'>Auto registrado correctamente.</div>";
} else {
    echo "<div class='alert alert-danger'>No se pudo registrar el auto.</div>";
}

echo "<a href='listarPersonas.php' class='btn btn-secondary mt-3'>Volver</a>";
?>

</div>
<script src="../Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>

