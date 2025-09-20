<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Auto</title>
    <link rel="stylesheet" href="../Frameworks/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2 class="mb-4">Registrar Nuevo Auto</h2>

    <form action="accionNuevoAuto.php" method="post" onsubmit="return validarFormularioAuto()" class="border p-4 rounded shadow">
        
        <div class="mb-3">
            <label for="patente" class="form-label">Patente</label>
            <input type="text" class="form-control" id="patente" name="patente" required placeholder="Ej: ABC123">
        </div>

        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo (Año)</label>
            <input type="number" class="form-control" id="modelo" name="modelo" min="1900" max="2099" required>
        </div>

        <div class="mb-3">
            <label for="dniDuenio" class="form-label">DNI Dueño</label>
            <input type="text" class="form-control" id="dniDuenio" name="dniDuenio" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Auto</button>
        <a href="listarPersonas.php" class="btn btn-secondary">Volver</a>
    </form>

    <script src="../Frameworks/bootstrap.bundle.min.js"></script>
    <script src="../Frameworks/js/validarFormulario.js"></script>
</body>
</html>
