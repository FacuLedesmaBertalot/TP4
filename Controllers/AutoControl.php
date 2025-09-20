<?php
include_once "../Models/Conector/BaseDatos.php";
include_once "../Models/Auto.php";

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


    // MÉTODO PARA OBTENER TODOS LOS AUTOS
    public static function listarTodos() {
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
    public static function buscarPorPatente($patente) {
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
    public static function listarPorDni($dni) {
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
    public static function cambiarDuenio($patente, $nuevoDni) {

    $db = new BaseDatos();
    $sql = "UPDATE auto SET DniDuenio = '$nuevoDni' WHERE Patente = '$patente'";
    return $db->Ejecutar($sql);
    }
    
}

?>