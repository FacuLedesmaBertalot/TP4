<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Buscar Persona</h4>
                    </div>
                    <div class="card-body">
                        <form action="accionBuscarPersona.php" method="post" onsubmit="return validarBuscarPersona()">
                            <div class="mb-3">
                                <label for="dni" class="form-label">Número de Documento:</label>
                                <input type="text" name="dni" id="dni" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-start gap-2">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                                <a href="../index.php" class="btn btn-primary">Volver</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require "../View/Structure/footer.php"; ?>

    <script src="Frameworks/bootstrap.bundle.min.js"></script>
    <script src="Frameworks/js/validarFormulario.js"></script>

</body>
</html>
