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
        <form action="accionBuscarPersona.php" method="post" onsubmit="return validarBuscarPersona()">
            <div class="mb-3">
                <label for="dni" class="form-label">Número de Documento:</label>
                <input type="text" name="dni" id="dni" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

    </div>

    <?php require "../View/Structure/footer.php" ?>


    <script src="Frameworks/bootstrap.bundle.min.js"></script>
    <script src="Frameworks/js/validarFormulario.js"></script>

</body>
</html>