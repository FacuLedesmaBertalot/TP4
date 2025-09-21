<?php
require_once "../Utils/funciones.php";
require_once "../Controllers/PersonaControl.php";

$datos = dataSubmited();

$dni = $datos['dni'];
$nombre = trim($datos['nombre']);
$apellido = trim($datos['apellido']);
$fechaNac = trim($datos['fechaNac']);
$telefono = trim($datos['telefono']);
$domicilio = trim($datos['domicilio']);

$persona = PersonaControl::buscarPorDni($dni);

if (!$persona) {
    echo "<div class='container mt-5'>
            <div class='alert alert-danger'>
                No se encontró la persona con DNI <strong>$dni</strong>.
            </div>
            <a href='BuscarPersona.html' class='btn btn-secondary mt-2'>Volver</a>
          </div>";
    exit;
}

$persona->setNombre($nombre);
$persona->setApellido($apellido);
$persona->setFechaNac($fechaNac);
$persona->setTelefono($telefono);
$persona->setDomicilio($domicilio);

$resultado = $persona->modificarControl();
?>

<div class='container mt-5'>
    <?php if (is_array($resultado) && isset($resultado['error'])): ?>
        <div class='alert alert-danger'>
            <strong>Error:</strong><br>
            <?= implode("<br>", $resultado['error']); ?>
        </div>
    <?php else: ?>
        <div class='alert alert-success'>
            Datos de la persona actualizados correctamente.
        </div>
    <?php endif; ?>
    <a href='BuscarPersona.php' class='btn btn-secondary mt-3'>Volver</a>
</div>
