<?php
// Inicio.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - PWD 2025</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./View/Frameworks/bootstrap.min.css">
</head>
<body class="d-flex flex-column min-vh-100">

<?php include_once('./View/Structure/header.php'); ?>

<!-- Contenido principal -->
<main class="container my-5 flex-grow-1">
    <div class="text-center">
        <h1 class="display-4 fw-bold mb-4">Bienvenido a PWD 2025</h1>
        <p class="lead mb-5">
            Este es el sitio de ejemplo donde se integran todos los trabajos prácticos y componentes desarrollados en PHP con Bootstrap.
        </p>

        <!-- Ejemplo de card destacada -->
        <div class="card shadow-sm mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">¡Explora nuestros TP!</h5>
                <p class="card-text">Accede a cada TP desde la barra de navegación para ver ejercicios y prácticas implementadas.</p>
                <a href="/View/index.php" class="btn btn-primary">Ir al TP4</a>
            </div>
        </div>
    </div>
</main>

<?php include_once('./View/Structure/footer.php'); ?>

<!-- Bootstrap JS -->
<script src="./View/Frameworks/bootstrap.bundle.min.js"></script>
</body>
</html>

