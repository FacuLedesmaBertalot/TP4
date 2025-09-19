<?php
// autosPersona.php
include_once "../Models/Auto.php";
include_once "../Models/Persona.php";
include_once "../Controllers/AutoControl.php";
include_once "../Controllers/PersonaControl.php";


// Verificar que se recibió el DNI
if (!isset($_GET['dni']) || empty($_GET['dni'])) {
    die("No se especificó ningún DNI.");
}

$dni = $_GET['dni'];

// Buscar la persona
$persona = PersonaControl::buscarPorDni($dni);

if (!$persona) {
    die("No se encontró ninguna persona con DNI $dni.");
}

// Listar autos de la persona
$autos = AutoControl::listarPorDni($dni);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Autos de Persona</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Autos de Persona</h1>

    <?php if (!$persona): ?>
        <div class="alert alert-danger">No se encontró ninguna persona con DNI <?php echo htmlspecialchars($dni); ?>.</div>
        <a href="listaPersonas.php" class="btn btn-secondary mt-3">Volver al listado</a>
    <?php else: ?>
        <div class="card mb-4">
            <div class="card-header">Datos de la Persona</div>
            <div class="card-body">
                <p><strong>DNI:</strong> <?php echo htmlspecialchars($persona->getNroDNI()); ?></p>
                <p><strong>Nombre:</strong> <?php echo htmlspecialchars($persona->getNombre()); ?></p>
                <p><strong>Apellido:</strong> <?php echo htmlspecialchars($persona->getApellido()); ?></p>
                <p><strong>Fecha de Nacimiento:</strong> <?php echo htmlspecialchars($persona->getFechaNac()); ?></p>
                <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($persona->getTelefono()); ?></p>
                <p><strong>Domicilio:</strong> <?php echo htmlspecialchars($persona->getDomicilio()); ?></p>
            </div>
        </div>

        <h3>Autos Asociados</h3>

        <?php if (empty($autos)): ?>
            <div class="alert alert-warning">Esta persona no tiene autos registrados.</div>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($autos as $auto): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($auto->getPatente()); ?></td>
                            <td><?php echo htmlspecialchars($auto->getMarca()); ?></td>
                            <td><?php echo htmlspecialchars($auto->getModelo()); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <a href="../View/listarPersonas.php" class="btn btn-secondary mt-3">Volver al listado</a>
    <?php endif; ?>
</div>

<script src="Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>
