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
    let regexLetras = /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/;
    let bool = true;

    if (dni === "" || isNaN(dni)) {
        errores.push("El DNI es obligatorio y debe ser numérico.");
        bool = false;
    }

    if (nombre === "" || !regexLetras.test(nombre)) {
        errores.push("El Nombre solo puede contener letras y espacios.");
        bool = false;
    }

    if (apellido === "" || !regexLetras.test(apellido)) {
        errores.push("El Apellido solo puede contener letras y espacios.");
        bool = false;
    }

    let fecha = new Date(fechaNac);
    let hoy = new Date();
    if (fechaNac === "" || isNaN(fecha.getTime())) {
        errores.push("La fecha de nacimiento no es válida.");
        bool = false;
    } else if (fecha > hoy) {
        errores.push("La fecha de nacimiento no puede ser futura.");
        bool = false;
    }

    if (telefono === "" || isNaN(telefono)) {
        errores.push("El Teléfono es obligatorio y debe ser numérico.");
        bool = false;
    }

    if (domicilio === "") {
        errores.push("Debe ingresar un domicilio.");
        bool = false;
    }

    if (errores.length > 0) alert(errores.join("\n"));

    return bool;
}


function validarFormularioAuto() {
    let patente = document.getElementById("patente").value.trim();
    let marca = document.getElementById("marca").value.trim();
    let modelo = document.getElementById("modelo").value.trim();
    let dniDuenio = document.getElementById("dniDuenio").value.trim();

    let errores = [];
    let bool = true; // inicializamos como verdadero

    // Validar Patente: AAA111
    let regexPatente = /^[A-Z]{3}[0-9]{3}$/i;
    if (!regexPatente.test(patente)) {
        errores.push("La patente debe tener formato AAA111.");
        bool = false;
    }

    // Validar Marca
    if (marca === "") {
        errores.push("Debe ingresar una marca.");
        bool = false;
    }

    // Validar Modelo
    const anioModelo = parseInt(modelo);
    const fechaActual = new Date();
    const anioActual = fechaActual.getFullYear();
    if (isNaN(anioModelo) || anioModelo < 1900 || anioModelo > anioActual) {
        errores.push("El modelo debe ser de un año válido.");
        bool = false;
    }

    // Validar DNI del dueño
    let regexDNI = /^\d+$/;
    if (!regexDNI.test(dniDuenio)) {
        errores.push("El DNI del dueño debe contener solo números.");
        bool = false;
    }

    // Mostrar errores si los hay
    if (errores.length > 0) {
        alert(errores.join("\n"));
    }

    return bool;
}

