<?php
class PersonaControl extends Persona {

    // Validar Datos
    private function validarDatos() {
        $errores = [];


        // DNI obligatorio
        if (empty($this->getNroDNI())) {
            $errores[] = "El DNI No Puede Estar Vacío";
        } elseif (!preg_match("/^\d+$/", $this->getNroDNI())) {
            $errores[] = "El DNI debe contener solo números.";
        }

        // Nombre y Apellido
        if (empty($this->getNombre())) {
            $errores[] = "El Nombre No Puede Estar Vacío";
        }

        if (empty($this->getApellido())) {
            $errores[] = "El Apellido No Puede Estar Vacío";
        }


        // Fecha de nacimiento válida
        if (empty($this->getFechaNac()) || !preg_match("/^\d{4}-\d{2}-\d{2}$/", $this->getFechaNac())) {
            $errores[] = "La fecha de nacimiento debe tener formato YYYY-MM-DD.";
        }


        // Teléfono Obligatorio
        if (empty($this->getTelefono())) {
            $errores[] = "El Teléfono No Puede Estar Vacío";
        }

        
        // Domicilio Obligatorio
        if (empty($this->getDomicilio())) {
            $errores[] = "El Domicilio No Puede Estar Vacío";
        }

        return $errores; 
    }



    /* +++++++++ CRUD +++++++++ */

    // INSERTAR
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
        $resultado = null;
        $errores = $this->validarDatos();

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

        if (empty($this->getNroDNI())) {
            $resultado = ["error" => "Debe especificar el DNI para eliminar."];
        } else {
            $resultado = parent::eliminar();
        }

        return $resultado;
    }

    // BUSCAR
    public function buscarControl($nroDNI) {
        $resultado = null;

        if (empty($nroDNI)) {
            $resultado = ["error" => "Debe especificar el DNI para buscar."];
        } else {
            $resultado = parent::buscar($nroDNI);
        }

        return $resultado;
    }


}