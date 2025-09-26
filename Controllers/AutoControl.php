<?php
include_once(__DIR__ . "/../Models/Conector/BaseDatos.php");
include_once(__DIR__ . "/../Models/Auto.php");


class AutoControl extends Auto {

    private function validarDatos() {
        $errores = [];

        // ===== Validar Patente =====
        if (empty($this->getPatente())) {
            $errores[] = "La patente no puede estar vacía.";

        } elseif (!preg_match("/^[A-Z]{3}\s[0-9]{3}$/", $this->getPatente())) {
            $errores[] = "La patente debe tener formato AAA 111.";

        } else {
            $db = new BaseDatos();
            $patente = $this->getPatente();
            $sql = "SELECT * FROM auto WHERE Patente = '$patente'";
            if ($db->Ejecutar($sql) > 0) {
                $errores[] = "La patente ya existe en el sistema.";
            }
        }

        // ===== Validar Marca =====
        if (empty($this->getMarca())) {
            $errores[] = "La marca no puede estar vacía.";

        } elseif (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/", $this->getMarca())) {
            $errores[] = "La marca solo puede contener letras y espacios.";
        }

        // ===== Validar Modelo =====
        $modelo = $this->getModelo();

        if (!is_numeric($modelo) || $modelo <= 0) {
            $errores[] = "El modelo debe ser un número positivo.";
        }

        // ===== Validar DNI del dueño =====
        if (!preg_match("/^\d+$/", $this->getDniDuenio())) {
            $errores[] = "El DNI del dueño debe contener solo números.";
        } else {
            // Verificar si existe el dueño en la BD
            $db = new BaseDatos();
            $dni = $this->getDniDuenio();
            $sql = "SELECT * FROM persona WHERE NroDni = '$dni'";
            if ($db->Ejecutar($sql) == 0) {
                $errores[] = "El DNI del dueño no existe en el sistema.";
            }
        }

        return $errores;
    }



    // ========= CRUD con control =========

    // INSERT
    public function insertarControl()
    {
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
    public function modificarControl()
    {
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
    public function eliminarControl()
    {
        $resultado = null;

        if (empty($this->getPatente())) {
            $resultado = ["error" => "Debe especificar la patente para eliminar"];
        } else {
            $resultado = parent::eliminar();
        }

        return $resultado;
    }

    // BUSCAR
    public function buscarControl($patente)
    {
        $resultado = null;

        if (empty($patente)) {
            $resultado = ["error" => "Debe especificar la patente para buscar."];
        } else {
            $resultado = parent::buscar($patente);
        }

        return $resultado;
    }


    // MÉTODO PARA OBTENER TODOS LOS AUTOS
    public static function listarTodos()
    {
        $base = new BaseDatos();
        $sql = "SELECT a.Patente, a.Marca, a.Modelo, a.DniDuenio, p.Nombre, p.Apellido
                FROM auto a 
                INNER JOIN persona p ON a.DniDuenio = p.NroDni";

        if ($base->Ejecutar($sql) > 0) {
            $autos = [];

            while ($row = $base->Registro()) {
                $autos[] = $row;
            }
            return $autos;
        }
        return [];
    }


    // MÉTODO PARA BUSCAR POR PATENTE
    public static function buscarPorPatente($patente)
    {
        $db = new BaseDatos();
        $sql = "SELECT * 
                FROM auto
                WHERE Patente = '$patente'";
        $resultado = null;

        if ($db->Ejecutar($sql) > 0) {
            $registro = $db->Registro();
            $auto = new AutoControl();
            $auto->setPatente($registro['Patente']);
            $auto->setMarca($registro['Marca']);
            $auto->setModelo($registro['Modelo']);
            $auto->setDniDuenio($registro['DniDuenio']);
            $resultado = $auto;
        }
        return $resultado;
    }


    // LISTAR AUTOS POR DNI DEL DUEÑO
    public static function listarPorDni($dni)
    {
        $db = new BaseDatos();
        $autos = [];

        $sql = "SELECT *
                FROM auto
                WHERE DniDuenio = '$dni'";

        if ($db->Ejecutar($sql) > 0) {
            while ($registro = $db->Registro()) {
                $a = new AutoControl();
                $a->setPatente($registro['Patente']);
                $a->setMarca($registro['Marca']);
                $a->setModelo($registro['Modelo']);
                $a->setDniDuenio($registro['DniDuenio']);
                $autos[] = $a;
            }
        }
        return $autos;
    }


    // MÉTODO PARA CAMBIAR DE DUEÑO
    public static function cambiarDuenio($patente, $nuevoDni)
    {

        $db = new BaseDatos();
        $sql = "UPDATE auto SET DniDuenio = '$nuevoDni' WHERE Patente = '$patente'";
        return $db->Ejecutar($sql);
    }
}
