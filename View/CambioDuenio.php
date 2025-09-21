<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Dueño</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php" ?>

    <div class="container mt-5">
        <h2>Cambio de Dueño de Auto</h2>
        <form action="accionCambioDuenio.php" method="post" onsubmit="return validarFormularioCambio()">
            <div class="mb-3">
                <label for="patente" class="form-label">Patente del Auto:</label>
                <input type="text" class="form-control" id="patente" name="patente" placeholder="Ej: ABC123" required>
            </div>
            <div class="mb-3">
                <label for="dniDuenio" class="form-label">DNI del Nuevo Dueño:</label>
                <input type="text" class="form-control" id="dniDuenio" name="dniDuenio" required>
            </div>
            <button type="submit" class="btn btn-primary">Cambiar Dueño</button>
        </form>
    </div>

    <?php require "../View/Structure/footer.php" ?>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
    <script src="Frameworks/js/validarFormulario.js"></script>

    
</body>

</html>