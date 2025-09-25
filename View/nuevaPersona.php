<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Persona</title>
    <link rel="stylesheet" href="Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "../View/Structure/header.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h4>Nueva Persona</h4>
                    </div>
                    <div class="card-body">
                        <form action="accionNuevaPersona.php" method="post" onsubmit="return validarFormularioPersona()">

                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" name="dni" id="dni" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="fechaNac" id="fechaNac" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="domicilio" class="form-label">Domicilio</label>
                                <input type="text" name="domicilio" id="domicilio" class="form-control" required>
                            </div>

                            <div class="d-flex justify-content-start gap-2">
                                <button type="submit" class="btn btn-success">Guardar Persona</button>
                                <a href="../index.php" class="btn btn-success">Volver</a>
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

