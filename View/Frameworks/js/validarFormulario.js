function validarFormulario() {
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

