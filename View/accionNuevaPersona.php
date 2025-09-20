<?php
require_once ("../Controllers/PersonaControl.php");
require_once ("../Utils/funciones.php");

$datos = dataSubmited();

// Crear obj PersonaControl
$persona = new PersonaControl();
$persona->setNroDNI($datos['dni'] ?? null);
$persona->setNombre($datos['nombre'] ?? null);
$persona->setApellido($datos['apellido'] ?? null);
$persona->setFechaNac($datos['fechaNac'] ?? null);
$persona->setTelefono($datos['telefono'] ?? null);
$persona->setDomicilio($datos['domicilio'] ?? null);

// Insertar
$resultado = $persona->insertarControl();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Nueva Persona</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php if (isset($resultado["error"])): ?>
                    <div class="alert alert-danger">
                        <h4 class="alert-heading">❌ Error al guardar</h4>
                        <ul>
                            <?php foreach ($resultado["error"] as $err): ?>
                                <li><?= $err ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="NuevaPersona.php" class="btn btn-primary mt-3">Volver al formulario</a>
                    </div>
                <?php else: ?>
                    <div class="alert alert-success">
                        <h4 class="alert-heading">✅ Persona registrada correctamente</h4>
                        <hr>
                        <p><strong>DNI:</strong> <?= htmlspecialchars($datos['dni']) ?></p>
                        <p><strong>Nombre:</strong> <?= htmlspecialchars($datos['nombre']) ?></p>
                        <p><strong>Apellido:</strong> <?= htmlspecialchars($datos['apellido']) ?></p>
                        <a href="../View/listarPersonas.php" class="btn btn-success mt-3">Ver Listado</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>