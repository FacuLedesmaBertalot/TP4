<?php

class Auto {

    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;

    // Constructor
    public function __construct($patente = "", $marca = "", $modelo = "", $dniDuenio = "")
    {
        $this->patente = $patente;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->dniDuenio = $dniDuenio;
    }

    // Getters
    public function getPatente()
    {
        return $this->patente;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function getDniDuenio()
    {
        return $this->dniDuenio;
    }

    // Setters
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function setDniDuenio($dniDuenio)
    {
        $this->dniDuenio = $dniDuenio;
    }


    /*****************  CRUD  *****************/

    // INSERT
    public function insertar()
    {
        $base = new BaseDatos();
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio) 
                VALUES ('{$this->getPatente()}','{$this->getMarca()}',
                        '{$this->getModelo()}','{$this->getDniDuenio()}')";
        return $base->Ejecutar($sql);
    }

    // MODIFICAR
    public function modificar()
    {
        $base = new BaseDatos();
        $sql = "UPDATE auto SET 
                    Marca='{$this->getMarca()}',
                    Modelo='{$this->getModelo()}',
                    DniDuenio='{$this->getDniDuenio()}'
                WHERE Patente='{$this->getPatente()}'";
        return $base->Ejecutar($sql);
    }

    // ELIMINAR
    public function eliminar()
    {
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente = '{$this->getPatente()}'";
        return $base->Ejecutar($sql);
    }

    // BUSCAR
    public function buscar($patente)
    {
        $bool = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente='{$patente}'";
        if ($base->Ejecutar($sql) > 0) {
            $row = $base->Registro();
            $this->setPatente($row['Patente']);
            $this->setMarca($row['Marca']);
            $this->setModelo($row['Modelo']);
            $this->setDniDuenio($row['DniDuenio']);
            $bool = true;
        }
        return $bool;
    }

}

?>