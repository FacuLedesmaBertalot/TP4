<?php
include_once "../Models/Conector/BaseDatos.php";
include_once "../Models/Persona.php";

class PersonaControl extends Persona {

    // ===== Validar Datos =====
    private function validarDatos($isInsert = true) {
        $errores = [];

        // ===== Validar DNI =====
        if (empty($this->getNroDNI())) {
            $errores[] = "El DNI no puede estar vacío.";
        } elseif (!preg_match("/^\d+$/", $this->getNroDNI())) {
            $errores[] = "El DNI debe contener solo números.";
        } else {
            if ($isInsert && $this->existeEnBD($this->getNroDNI())) {
                $errores[] = "El DNI ya existe en el sistema.";
            }
        }

        // ===== Validar Nombre =====
        if (empty($this->getNombre())) {
            $errores[] = "El nombre no puede estar vacío.";
        } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/", $this->getNombre())) {
            $errores[] = "El nombre solo puede contener letras y espacios.";
        }

        // ===== Validar Apellido =====
        if (empty($this->getApellido())) {
            $errores[] = "El apellido no puede estar vacío.";
        } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/", $this->getApellido())) {
            $errores[] = "El apellido solo puede contener letras y espacios.";
        }

        // ===== Validar Fecha de Nacimiento =====
        $fecha = DateTime::createFromFormat('Y-m-d', $this->getFechaNac());
        if (!$fecha || $fecha->format('Y-m-d') !== $this->getFechaNac()) {
            $errores[] = "La fecha de nacimiento no es válida.";
        }

        // ===== Validar Teléfono =====
        if (empty($this->getTelefono())) {
            $errores[] = "El teléfono no puede estar vacío.";
        } elseif (!preg_match("/^\d+$/", $this->getTelefono())) {
            $errores[] = "El teléfono solo puede contener números.";
        }

        // ===== Validar Domicilio =====
        if (empty($this->getDomicilio())) {
            $errores[] = "El domicilio no puede estar vacío.";
        }

        return $errores;
    }

    // ===== Comprobar si el DNI ya existe =====
    private function existeEnBD($dni) {
        $db = new BaseDatos();
        $sql = "SELECT NroDni FROM persona WHERE NroDni = '$dni'";
        return ($db->Ejecutar($sql) > 0);
    }

    /* +++++++++ CRUD +++++++++ */

    // INSERTAR
    public function insertarControl() {
        $errores = $this->validarDatos(true); // true = insert
        if (!empty($errores)) {
            return ["error" => $errores];
        }
        return parent::insertar();
    }

    // MODIFICAR
    public function modificarControl() {
        $errores = $this->validarDatos(false); // false = modificar
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
            $p = new PersonaControl();
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
