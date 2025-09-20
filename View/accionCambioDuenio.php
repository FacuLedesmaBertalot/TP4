<?php

require_once "../Utils/funciones.php";
require_once "../Controllers/AutoControl.php";
require_once "../Controllers/PersonaControl.php";

$datos = dataSubmited();

$patente = $datos['patente'];
$dniNuevoDuenio = $datos['dniDuenio'];

// Verifica si el auto existe
$auto = AutoControl::buscarPorPatente($patente);

if (!$auto) {
    echo "<div class='container mt-5'>
            <div class='alert alert-danger'>
                No existe ningún auto con la patente <strong>$patente</strong>.
            </div>
            <a href='CambioDuenio.php' class='btn btn-secondary mt-2'>Volver</a>
          </div>";
    exit;
}

// Verifica si la persona existe
$persona = PersonaControl::buscarPorDni($dniNuevoDuenio);

if (!$persona) {
    echo "<div class='container mt-5'>
            <div class='alert alert-danger'>
                No existe ninguna persona con DNI <strong>$dniNuevoDuenio</strong>.
                <br><a href='NuevaPersona.php' class='btn btn-sm btn-primary mt-2'>Registrar nueva persona</a>
            </div>
          </div>";
    exit;
}

// Cambia de Dueño
$auto->setDniDuenio($dniNuevoDuenio);
$resultado = AutoControl::cambiarDuenio($patente, $dniNuevoDuenio);


echo "<div class='container mt-5'>";
if (is_array($resultado) && isset($resultado['error'])) {
    echo "<div class='alert alert-danger'><strong>Error:</strong><br>" . implode("<br>", $resultado['error']) . "</div>";
} elseif ($resultado) {
    echo "<div class='alert alert-success'>El dueño del auto con patente <strong>$patente</strong> se actualizó correctamente.</div>";
} else {
    echo "<div class='alert alert-danger'>No se pudo cambiar el dueño del auto.</div>";
}
echo "<a href='CambioDuenio.php' class='btn btn-secondary mt-3'>Volver</a>";
echo "</div>";

?>