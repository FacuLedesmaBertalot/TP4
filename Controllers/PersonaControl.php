<?php
class PersonaControl extends Persona {

    // Validar Datos
    private function validarDatos() {
        $errores = [];

        // DNI obligatorio
        if (empty($this->getNroDNI())) {
            $errores[] = "El DNI no puede estar vacío.";
        } elseif (!preg_match("/^\d+$/", $this->getNroDNI())) {
            $errores[] = "El DNI debe contener solo números.";
        }

        // Nombre y Apellido
        if (empty($this->getNombre())) {
            $errores[] = "El nombre no puede estar vacío.";
        }

        if (empty($this->getApellido())) {
            $errores[] = "El apellido no puede estar vacío.";
        }

        // Fecha de nacimiento válida (formato + existencia real de fecha)
        $fecha = DateTime::createFromFormat('Y-m-d', $this->getFechaNac());
        if (!$fecha || $fecha->format('Y-m-d') !== $this->getFechaNac()) {
            $errores[] = "La fecha de nacimiento no es válida.";
        }

        // Teléfono Obligatorio
        if (empty($this->getTelefono())) {
            $errores[] = "El teléfono no puede estar vacío.";
        }

        // Domicilio Obligatorio
        if (empty($this->getDomicilio())) {
            $errores[] = "El domicilio no puede estar vacío.";
        }

        return $errores; 
    }


    /* +++++++++ CRUD +++++++++ */

    // INSERTAR
    public function insertarControl() {
        $errores = $this->validarDatos();
        if (!empty($errores)) {
            return ["error" => $errores];
        }
        return parent::insertar();
    }

    // MODIFICAR
    public function modificarControl() {
        $errores = $this->validarDatos();
        if (!empty($errores)) {
            return ["error" => $errores];
        }
        return parent::modificar();
    }

    // ELIMINAR
    public function eliminarControl() {
        if (empty($this->getNroDNI())) {
            return ["error" => "Debe especificar el DNI para eliminar."];
        }
        return parent::eliminar();
    }

    // BUSCAR
    public function buscarControl($nroDNI) {
        if (empty($nroDNI)) {
            return ["error" => "Debe especificar el DNI para buscar."];
        }
        return parent::buscar($nroDNI);
    }


    /* +++++++++ MÉTODOS +++++++++ */

    // LISTAR TODAS LAS PERSONAS
    public static function listarTodos() {
        $db = new BaseDatos();
        $personas = [];

        $sql = "SELECT * FROM persona";

        if ($db->Ejecutar($sql) > 0) {
            while ($registro = $db->Registro()) {
                $p = new Persona();
                $p->setNroDNI($registro['NroDni']);
                $p->setApellido($registro['Apellido']);
                $p->setNombre($registro['Nombre']);
                $p->setFechaNac($registro['fechaNac']);
                $p->setTelefono($registro['Telefono']);
                $p->setDomicilio($registro['Domicilio']);
                $personas[] = $p;
            }
        }
        return $personas;
    }

    // BUSCAR UNA PERSONA POR DNI (devuelve objeto Persona)
    public static function buscarPorDni($dni) {
        $db = new BaseDatos();
        $persona = null;

        $sql = "SELECT * FROM persona WHERE NroDni = '$dni'";

        if ($db->Ejecutar($sql) > 0) {
            $registro = $db->Registro();
            $p = new Persona();
            $p->setNroDNI($registro['NroDni']);
            $p->setApellido($registro['Apellido']);
            $p->setNombre($registro['Nombre']);
            $p->setFechaNac($registro['fechaNac']);
            $p->setTelefono($registro['Telefono']);
            $p->setDomicilio($registro['Domicilio']);
            $persona = $p;
        }
        return $persona;
    }
}

?>
