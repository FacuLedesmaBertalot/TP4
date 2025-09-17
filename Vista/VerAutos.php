<?php
// Incluimos las clases necesarias
include_once "../Modelo/Conector/BaseDatos.php";
include_once "../Modelo/Auto.php";
include_once "../Control/AutoControl.php";

// Llamada al método estático para obtener todos los autos con dueños
$autos = AutoControl::listarTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f8f9fa;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px 15px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        caption {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?php if (!empty($autos)): ?>
    <table>
        <caption>Lista de Autos</caption>
        <thead>
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
<?php else: ?>
    <p>No hay autos cargados en la base de datos</p>
<?php endif; ?>

</body>
</html>
