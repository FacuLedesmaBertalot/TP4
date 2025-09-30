<?php
require_once "../../Utils/funciones.php";
require_once "../../Controllers/AutoControl.php";
require_once "../../Controllers/PersonaControl.php";

// Recibir datos del formulario usando dataSubmited
$datos = dataSubmited();
$patente = isset($datos['patente']) ? trim($datos['patente']) : '';
$dniNuevoDuenio = isset($datos['dniDuenio']) ? trim($datos['dniDuenio']) : '';

$resultado = [];

// Validaciones del lado servidor
if (empty($patente) || !preg_match("/^[A-Z]{3}\s\d{3}$/i", $patente)) {
    $resultado['error'][] = "Formato de patente inválido. Ej: ABC 123.";
}

if (empty($dniNuevoDuenio) || !preg_match("/^\d+$/", $dniNuevoDuenio)) {
    $resultado['error'][] = "El DNI del nuevo dueño es obligatorio y debe ser numérico.";
}

// Si no hay errores, intentar cambiar dueño
if (empty($resultado['error'])) {
    $cambio = AutoControl::cambiarDuenio($patente, $dniNuevoDuenio);

    if ($cambio) {
        $resultado['exito'] = "El dueño del auto con patente <strong>$patente</strong> se ha cambiado correctamente.";
    } else {
        $resultado['error'][] = "No se pudo cambiar el dueño. Verifique que la patente exista.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Cambio de Dueño</title>
    <link rel="stylesheet" href="../Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "../Structure/header.php"; ?>

    <div class="container mt-5">
        <h2>Cambio de Dueño de Auto</h2>

        <?php if (isset($resultado['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    <?php foreach ($resultado['error'] as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($resultado['exito'])): ?>
            <div class="alert alert-success" role="alert">
                <?= $resultado['exito'] ?>
            </div>
        <?php endif; ?>

        <a href="../CambioDuenio.php" class="btn btn-primary mt-3">Volver</a>
    </div>

    <?php require "../Structure/footer.php"; ?>
    
    <script src="../Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>
