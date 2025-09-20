function validarFormularioPatente() {
  let patente = document.getElementById("patente").value.trim();
  let resultado = true;

  if (patente === "") {
    alert("Debe ingresar una patente.");
    resultado = false;
  } else {
    // Solo acepta formato AAA111
    let regex = /^[A-Z]{3}[0-9]{3}$/i;
    if (!regex.test(patente)) {
      alert("Formato de patente inválido. Ej: ABC123.");
      resultado = false;
    }
  }

  return resultado;
}

function validarFormularioPersona() {
  let dni = document.getElementById("dni").value.trim();
  let nombre = document.getElementById("nombre").value.trim();
  let apellido = document.getElementById("apellido").value.trim();
  let fechaNac = document.getElementById("fechaNac").value.trim();
  let telefono = document.getElementById("telefono").value.trim();
  let domicilio = document.getElementById("domicilio").value.trim();

  let errores = [];

  // DNI
  if (dni === "" || isNaN(dni)) {
    errores.push("El DNI es obligatorio y debe ser Numérico");
  }

  // Nombre
  let regexLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
  if (nombre === "") {
    errores.push("El Nombre es obligatorio.");
  } else if (!regexLetras.test(nombre)) {
    errores.push("El Nombre solo puede contener letras y espacios.");
  }

  // Apellido
  if (apellido === "") {
    errores.push("El Apellido es obligatorio.");
  } else if (!regexLetras.test(apellido)) {
    errores.push("El Apellido solo puede contener letras y espacios.");
  }

  // Fecha de Nacimiento
  if (fechaNac === "") {
    errores.push("Debe ingresar una fecha de nacimiento");
  } else {
    let fecha = new Date(fechaNac);
    let hoy = new Date();

    if (isNaN(fecha.getTime())) {
      errores.push("La fecha de nacimiento no es válida.");
    } else if (fecha > hoy) {
      errores.push("La fecha de nacimiento no puede ser futura.");
    }
  }

  // Teléfono
  if (telefono === "" || isNaN(telefono)) {
    errores.push("El Teléfono es obligatorio y debe ser numérico");
  }

  // Domicilio
  if (domicilio == "") {
    errores.push("Debe ingresar un domicilio");
  }

  // Muestra errores si los hay
  if (errores.length > 0) {
    alert(errores.join("\n"));
    return false;
  }

  return true;
}
