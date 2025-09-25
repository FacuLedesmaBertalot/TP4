// ================= Funciones útiles =================

function esNumerico(valor) {
    return /^\d+$/.test(valor);
}

function esSoloLetras(valor) {
    return /^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/.test(valor);
}

// ✅ Patente en formato ABC 123
function esPatenteValida(patente) {
    return /^[A-Z]{3}\s[0-9]{3}$/i.test(patente);
}

// Mostrar errores debajo del input
function mostrarError(inputId, mensaje) {
    const input = document.getElementById(inputId);
    let errorDiv = document.getElementById("error" + inputId.charAt(0).toUpperCase() + inputId.slice(1));

    if (!errorDiv) {
        errorDiv = document.createElement("div");
        errorDiv.id = "error" + inputId.charAt(0).toUpperCase() + inputId.slice(1);
        errorDiv.className = "invalid-feedback";
        input.parentNode.appendChild(errorDiv);
    }

    if (mensaje) {
        input.classList.add("is-invalid");
        errorDiv.textContent = mensaje;
    } else {
        input.classList.remove("is-invalid");
        errorDiv.textContent = "";
    }
}

// Limpiar errores de todo el formulario
function limpiarErrores(formId) {
    const form = document.getElementById(formId);
    const inputs = form.querySelectorAll("input");
    inputs.forEach(input => mostrarError(input.id, ""));
}

// ================= Validaciones por formulario =================

// Validar formulario de Patente
function validarFormularioPatente() {
    let patente = document.getElementById("patente").value.trim();
    let errores = false;
    mostrarError("patente", "");

    if (!patente) {
        mostrarError("patente", "Debe ingresar una patente.");
        errores = true;
    } else if (!esPatenteValida(patente)) {
        mostrarError("patente", "Formato de patente inválido. Ej: ABC 123.");
        errores = true;
    }

    return !errores;
}

// Validar formulario de Persona
function validarFormularioPersona() {
    let dni = document.getElementById("dni").value.trim();
    let nombre = document.getElementById("nombre").value.trim();
    let apellido = document.getElementById("apellido").value.trim();
    let fechaNac = document.getElementById("fechaNac").value.trim();
    let telefono = document.getElementById("telefono").value.trim();
    let domicilio = document.getElementById("domicilio").value.trim();

    let errores = false;
    mostrarError("dni", "");
    mostrarError("nombre", "");
    mostrarError("apellido", "");
    mostrarError("fechaNac", "");
    mostrarError("telefono", "");
    mostrarError("domicilio", "");

    const hoy = new Date();

    if (!dni || !esNumerico(dni)) { mostrarError("dni", "El DNI es obligatorio y debe ser numérico."); errores = true; }
    if (!nombre || !esSoloLetras(nombre)) { mostrarError("nombre", "El nombre solo puede contener letras y espacios."); errores = true; }
    if (!apellido || !esSoloLetras(apellido)) { mostrarError("apellido", "El apellido solo puede contener letras y espacios."); errores = true; }

    const fecha = new Date(fechaNac);
    if (!fechaNac || isNaN(fecha.getTime())) { mostrarError("fechaNac", "La fecha de nacimiento no es válida."); errores = true; }
    else if (fecha > hoy) { mostrarError("fechaNac", "La fecha de nacimiento no puede ser futura."); errores = true; }

    if (!telefono || !esNumerico(telefono)) { mostrarError("telefono", "El teléfono es obligatorio y debe ser numérico."); errores = true; }
    if (!domicilio) { mostrarError("domicilio", "Debe ingresar un domicilio."); errores = true; }

    return !errores;
}

// Validar formulario de Auto
function validarFormularioAuto() {
    let patente = document.getElementById("patente").value.trim();
    let marca = document.getElementById("marca").value.trim();
    let modelo = document.getElementById("modelo").value.trim();
    let dniDuenio = document.getElementById("dniDuenio").value.trim();

    let errores = false;
    mostrarError("patente", "");
    mostrarError("marca", "");
    mostrarError("modelo", "");
    mostrarError("dniDuenio", "");

    const anioActual = new Date().getFullYear();
    const anioModelo = parseInt(modelo);

    if (!esPatenteValida(patente)) { mostrarError("patente", "La patente debe tener formato ABC 123."); errores = true; }
    if (!marca) { mostrarError("marca", "Debe ingresar una marca."); errores = true; }
    if (isNaN(anioModelo) || anioModelo < 0 || anioModelo > anioActual) { mostrarError("modelo", "El modelo debe ser un año válido."); errores = true; }
    if (!dniDuenio || !esNumerico(dniDuenio)) { mostrarError("dniDuenio", "El DNI del dueño debe contener solo números."); errores = true; }

    return !errores;
}

// Validar formulario de Cambio de Dueño
function validarFormularioCambio() {
    let patente = document.getElementById("patente").value.trim();
    let dni = document.getElementById("dniDuenio").value.trim();

    let errores = false;
    mostrarError("patente", "");
    mostrarError("dniDuenio", "");

    if (!esPatenteValida(patente)) { mostrarError("patente", "Formato de patente inválido. Ej: ABC 123."); errores = true; }
    if (!dni || !esNumerico(dni)) { mostrarError("dniDuenio", "El DNI del nuevo dueño es obligatorio y debe ser numérico."); errores = true; }

    return !errores;
}

// ================= Validación en tiempo real =================
document.querySelectorAll("input").forEach(input => {
    input.addEventListener("input", () => mostrarError(input.id, ""));
});


