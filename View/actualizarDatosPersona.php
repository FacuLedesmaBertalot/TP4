<?php
require_once "../Utils/funciones.php";
require_once "../Controllers/PersonaControl.php";

$datos = dataSubmited();

$dni = $datos['dni'];
$nombre = trim($datos['nombre']);
$apellido = trim($datos['apellido']);
$fechaNac = trim($datos['fechaNac']);
$telefono = trim($datos['telefono']);
$domicilio = trim($datos['domicilio']);

$persona = PersonaControl::buscarPorDni($dni);

if ($persona) {
    $persona->setNombre($nombre);
    $persona->setApellido($apellido);
    $persona->setFechaNac($fechaNac);
    $persona->setTelefono($telefono);
    $persona->setDomicilio($domicilio);

    $resultado = $persona->modificarControl();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Actualización</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php"; ?>

    <div class="container mt-5">
        <?php if (!$persona): ?>
            <div class="alert alert-danger">
                No se encontró la persona con DNI <strong><?= htmlspecialchars($dni) ?></strong>.
            </div>
            <a href="BuscarPersona.php" class="btn btn-secondary mt-3">Volver</a>
        <?php elseif (is_array($resultado) && isset($resultado['error'])): ?>
            <div class="alert alert-danger">
                <strong>Error:</strong><br>
                <?= implode("<br>", $resultado['error']); ?>
            </div>
            <a href="BuscarPersona.php" class="btn btn-secondary mt-3">Volver</a>
        <?php else: ?>
            <div class="alert alert-success">
                Datos de la persona actualizados correctamente.
            </div>
            <a href="BuscarPersona.php" class="btn btn-success mt-3">Volver a Buscar</a>
        <?php endif; ?>
    </div>

    <?php require "../View/Structure/footer.php"; ?>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>

