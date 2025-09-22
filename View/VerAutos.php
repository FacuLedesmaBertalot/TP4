<?php
// Incluimos las clases necesarias
include_once "../Models/Conector/BaseDatos.php";
include_once "../Models/Auto.php";
include_once "../Controllers/AutoControl.php";

// Llamada al método estático para obtener todos los autos con dueños
$autos = AutoControl::listarTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php"; ?>

    <div class="container my-5">
        <?php if (!empty($autos)): ?>
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fs-5">
                    Lista de Autos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Patente</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>DNI Dueño</th>
                                    <th>Nombre Dueño</th>
                                    <th>Apellido Dueño</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($autos as $auto): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($auto['Patente']) ?></td>
                                        <td><?= htmlspecialchars($auto['Marca']) ?></td>
                                        <td><?= htmlspecialchars($auto['Modelo']) ?></td>
                                        <td><?= htmlspecialchars($auto['DniDuenio']) ?></td>
                                        <td><?= htmlspecialchars($auto['Nombre']) ?></td>
                                        <td><?= htmlspecialchars($auto['Apellido']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center shadow-sm">
                <strong>No hay autos cargados</strong> en la base de datos.
            </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
        </div>
    </div>

    <?php require "../View/Structure/footer.php"; ?>

    <script src="../Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>

