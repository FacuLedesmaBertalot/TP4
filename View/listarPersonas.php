<?php

include_once "../Models/Persona.php";
include_once "../Controllers/PersonaControl.php";

$personas = PersonaControl::listarTodos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Personas</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php" ?>
    <div class="container mt-5">
        <h1 class="mb-4">Listado de Personas</h1>

        <?php if (empty($personas)): ?>
            <div class="alert alert-warning">No Hay Personas Registradas.</div>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>DNI</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Teléfono</th>
                        <th>Domicilio</th>
                        <th>Autos</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($personas as $persona): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($persona->getNroDNI()); ?></td>
                            <td><?php echo htmlspecialchars($persona->getApellido()); ?></td>
                            <td><?php echo htmlspecialchars($persona->getNombre()); ?></td>
                            <td><?php echo htmlspecialchars($persona->getFechaNac()); ?></td>
                            <td><?php echo htmlspecialchars($persona->getTelefono()); ?></td>
                            <td><?php echo htmlspecialchars($persona->getDomicilio()); ?></td>
                            <td>
                                <a href="autosPersona.php?dni=<?php echo urlencode($persona->getNroDNI()); ?>" class="btn btn-primary btn-sm">
                                    Ver Autos
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="../index.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

    <?php require "../View/Structure/footer.php" ?>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>

</body>
</html>
