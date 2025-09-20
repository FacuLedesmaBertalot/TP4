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

<div class="container my-5">
    <?php if (!empty($autos)): ?>
        <div class="table-responsive shadow-sm">
            <table class="table table-striped table-bordered text-center align-middle">
                <caption class="fs-4 mb-3">Lista de Autos</caption>
                <thead class="table-primary">
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
    <?php else: ?>
        <p class="text-center fs-5 mt-5">No hay autos cargados en la base de datos</p>
    <?php endif; ?>
</div>


<?php include "./Structure/footer.php"; ?>
<script src="../Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>
