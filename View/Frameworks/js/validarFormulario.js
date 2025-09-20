// Funciones Utiles
function esNumerico(valor) {
  return /^\d+$/.test(valor);
}

function esSoloLetras(valor) {
  return /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/.test(valor);
}

function esPatenteValida(patente) {
  return /^[A-Z]{3}[0-9]{3}$/i.test(patente);
}

function mostrarErrores(errores) {
    $bool = true;
  if (errores.length > 0) {
    alert(errores.join("\n"));
    $bool = false;
  }
  return $bool;
}


function validarFormularioPatente() {
  let patente = document.getElementById("patente").value.trim();
  let errores = [];

  if (patente === "") {
    errores.push("Debe ingresar una patente.");
  } else if (!esPatenteValida(patente)) {
    errores.push("Formato de patente inválido. Ej: ABC123.");
  }

  return mostrarErrores(errores);
}

function validarFormularioPersona() {
  let dni = document.getElementById("dni").value.trim();
  let nombre = document.getElementById("nombre").value.trim();
  let apellido = document.getElementById("apellido").value.trim();
  let fechaNac = document.getElementById("fechaNac").value.trim();
  let telefono = document.getElementById("telefono").value.trim();
  let domicilio = document.getElementById("domicilio").value.trim();

  let errores = [];
  let hoy = new Date();

  if (!dni || !esNumerico(dni)) errores.push("El DNI es obligatorio y debe ser numérico.");
  if (!nombre || !esSoloLetras(nombre)) errores.push("El Nombre solo puede contener letras y espacios.");
  if (!apellido || !esSoloLetras(apellido)) errores.push("El Apellido solo puede contener letras y espacios.");

  let fecha = new Date(fechaNac);
  if (!fechaNac || isNaN(fecha.getTime())) errores.push("La fecha de nacimiento no es válida.");
  else if (fecha > hoy) errores.push("La fecha de nacimiento no puede ser futura.");

  if (!telefono || !esNumerico(telefono)) errores.push("El Teléfono es obligatorio y debe ser numérico.");
  if (!domicilio) errores.push("Debe ingresar un domicilio.");

  return mostrarErrores(errores);
}

function validarFormularioAuto() {
  let patente = document.getElementById("patente").value.trim();
  let marca = document.getElementById("marca").value.trim();
  let modelo = document.getElementById("modelo").value.trim();
  let dniDuenio = document.getElementById("dniDuenio").value.trim();

  let errores = [];
  let anioActual = new Date().getFullYear();

  if (!esPatenteValida(patente)) errores.push("La patente debe tener formato AAA111.");
  if (!marca) errores.push("Debe ingresar una marca.");

  const anioModelo = parseInt(modelo);
  if (isNaN(anioModelo) || anioModelo < 1900 || anioModelo > anioActual) {
    errores.push("El modelo debe ser de un año válido.");
  }

  if (!dniDuenio || !esNumerico(dniDuenio)) errores.push("El DNI del dueño debe contener solo números.");

  return mostrarErrores(errores);
}

function validarFormularioCambio() {
  let patente = document.getElementById("patente").value.trim();
  let dni = document.getElementById("dniDuenio").value.trim();
  let errores = [];

  if (!esPatenteValida(patente)) errores.push("Formato de patente inválido. Ej: ABC123.");
  if (!dni || !esNumerico(dni)) errores.push("El DNI del nuevo dueño es obligatorio y debe ser numérico.");

  return mostrarErrores(errores);
}
