<?php
include_once "../Models/Conector/BaseDatos.php";
include_once "../Models/Auto.php";
include_once "../Controllers/AutoControl.php";

$patente = strtoupper(trim($_POST['patente']));

// Verifica si la patente tiene el formato AAA111 sin espacio
if (preg_match('/^[A-Z]{3}\d{3}$/', $patente)) {
    $patente = substr($patente, 0, 3) . ' ' . substr($patente, 3, 3);

}

$auto = null;
if (!empty($patente)) {
    $auto = AutoControl::buscarPorPatente($patente);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Búsqueda</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">

        <?php if ($auto) { ?>
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Auto encontrado</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Patente</th>
                            <td><?= $auto->getPatente(); ?></td>
                        </tr>
                        <tr>
                            <th>Marca</th>
                            <td><?= $auto->getMarca(); ?></td>
                        </tr>
                        <tr>
                            <th>Modelo</th>
                            <td><?= $auto->getModelo(); ?></td>
                        </tr>
                        <tr>
                            <th>DNI Dueño</th>
                            <td><?= $auto->getDniDuenio(); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php } else { ?>
            <div class="alert alert-danger shadow-lg">
                ❌ No se encontró ningún auto con la patente ingresada.
            </div>
        <?php } ?>

        <div class="mt-3">
            <a href="buscarAuto.php" class="btn btn-primary">Volver a buscar</a>
        </div>
    </div>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>