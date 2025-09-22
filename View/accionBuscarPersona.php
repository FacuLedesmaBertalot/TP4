<?php
require_once "../Utils/funciones.php";
require_once "../Controllers/PersonaControl.php";

$datos = dataSubmited();
$dni = isset($datos['dni']) ? trim($datos['dni']) : '';

$persona = PersonaControl::buscarPorDni($dni);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Persona</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php"; ?>

    <div class="container mt-5">
        <?php if (!$persona): ?>
            <div class="alert alert-danger">
                No se encontró ninguna persona con DNI <strong><?= htmlspecialchars($dni) ?></strong>.
            </div>
            <a href="BuscarPersona.php" class="btn btn-secondary mt-2">Volver</a>
        <?php else: ?>
            <h2>Actualizar Datos de Persona</h2>
            <form action="ActualizarDatosPersona.php" method="post" onsubmit="return validarFormularioPersona()">
                <input type="hidden" name="dni" value="<?= $persona->getNroDNI(); ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $persona->getNombre(); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $persona->getApellido(); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fechaNac" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNac" name="fechaNac" value="<?= $persona->getFechaNac(); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $persona->getTelefono(); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="domicilio" class="form-label">Domicilio:</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?= $persona->getDomicilio(); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Actualizar Datos</button>
            </form>
        <?php endif; ?>
    </div>

    <?php require "../View/Structure/footer.php"; ?>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
    <script src="Frameworks/js/validarFormulario.js"></script>
</body>
</html>

