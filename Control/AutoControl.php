<?php

class AutoControl extends Auto {

    private function validarDatos() {
        $errores = [];

        // Validar Patente
        if (empty($this->getPatente())) {
            $errores[] = "La Patente no Puede Estar Vacía";
        } elseif (!preg_match("/^[A-Z]{3}\s?\d{3}$/", $this->getPatente())) {
            $errores[] = "La patente debe tener formato AAA 111";
        }

        // Validar Marca
        if (empty($this->getMarca())) {
            $errores[] = "La Patente no Puede Estar Vacía";
        }

        // Validar Modelo
        if (!is_numeric($this->getModelo()) || $this->getModelo() <= 0) {
            $errores[] = "El Modelo Debe ser un Número Positivo";
        }

        // Validar DNI del dueño (solo números)
        if (!preg_match("/^\d+$/", $this->getDniDuenio())) {
            $errores[] = "El DNI del dueño debe contener solo números.";
        }

        return $errores;
    }

    // INSERT
    public function insertarControl() {
        $resultado = null;
        $errores = $this->validarDatos();

        if (!empty($errores)) {
            $resultado = ["error" => $errores];
        } else {
            $resultado = parent::insertar();
        }

        return $resultado;
    }

    // MODIFICAR
    public function modificarControl() {
        $errores = $this->validarDatos();
        $resultado = null;

        if (!empty($errores)) {
            $resultado = ["error" => $errores];
        } else {
            $resultado = parent::modificar();
        }

        return $resultado;
    }

    // ELIMINAR
    public function eliminarControl() {
        $resultado = null;

        if (empty($this->getPatente())) {
            $resultado = ["error" => "Debe especificar la patente para eliminar"];
        } else {
            $resultado = parent::eliminar();
        }

        return $resultado;
    }

    // BUSCAR
    public function buscarControl($patente) {
        $resultado = null;

        if (empty($patente)) {
            $resultado = ["error" => "Debe especificar la patente para buscar."];
        } else {
            $resultado = parent::buscar($patente);
        }

        return $resultado;
    }
    
}

?>