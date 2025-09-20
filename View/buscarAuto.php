<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Auto</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Buscar Auto</h4>
            </div>
            <div class="card-body">
                <form action="accionBuscarAuto.php" method="post" onsubmit="return validarFormularioPatente();">
                    <div class="mb-3">
                        <label for="patente" class="form-label">Número de Patente</label>
                        <input type="text" id="patente" name="patente" class="form-control" placeholder="Ej: ABC123" required>
                    </div>
                    <button type="submit" class="btn btn-success">Buscar</button>
                </form>
            </div>
        </div>
    </div>

<script src="./Frameworks/bootstrap.bundle.min.js"></script>
<script src="./Frameworks/js/validarFormulario.js"></script>
</body>
</html>