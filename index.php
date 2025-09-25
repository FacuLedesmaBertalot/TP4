<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Autos y Personas</title>
    <link rel="stylesheet" href="View/Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require "View/Structure/header.php"; ?>

    <div class="container my-5">
        <h1 class="text-center mb-4 text-primary">Gestión de Autos y Personas</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            
            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Ver Autos</h5>
                        <p class="card-text">Consulta el listado completo de autos con sus respectivos dueños.</p>
                        <a href="./View/verAutos.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Listar Personas</h5>
                        <p class="card-text">Visualiza todas las personas registradas en el sistema.</p>
                        <a href="View/listarPersonas.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Nueva Persona</h5>
                        <p class="card-text">Agrega una nueva persona al sistema completando el formulario.</p>
                        <a href="View/nuevaPersona.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Nuevo Auto</h5>
                        <p class="card-text">Registra un nuevo auto y asígnale un dueño.</p>
                        <a href="View/nuevoAuto.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Cambio de Dueño</h5>
                        <p class="card-text">Realiza la transferencia de un auto a un nuevo propietario.</p>
                        <a href="View/cambioDuenio.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm border-primary">
                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title text-primary">Buscar Persona</h5>
                        <p class="card-text">Busca una persona específica por DNI y gestiona sus datos.</p>
                        <a href="View/buscarPersona.php" class="btn btn-primary mt-auto">Ir</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require "View/Structure/footer.php"; ?>

    <script src="View/Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>
