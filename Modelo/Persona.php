<?php

class Persona {
    private $nroDNI;
    private $nombre;
    private $apellido;
    private $fechaNac;
    private $telefono;
    private $domicilio;

    // Constructor
    public function __construct($nroDNI, $nombre, $apellido, $fechaNac, $telefono, $domicilio)
    {
        $this->nroDNI = $nroDNI;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNac = $fechaNac;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
    }

    // Getters
    public function getNroDNI() { return $this->nroDNI; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getFechaNac() { return $this->fechaNac; }
    public function getTelefono() { return $this->telefono; }
    public function getDomicilio() { return $this->domicilio; }

    // Setters
    public function setNroDNI($nroDNI) { $this->nroDNI = $nroDNI; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setFechaNac($fechaNac) { $this->fechaNac = $fechaNac; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setDomicilio($domicilio) { $this->domicilio = $domicilio; }

    /*****************  CRUD  *****************/

    // INSERT
    public function insertar() {
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(NroDni, Apellido, Nombre, fechaNac, Telefono, Domicilio) 
                VALUES ('{$this->getNroDNI()}','{$this->getApellido()}','{$this->getNombre()}',
                        '{$this->getFechaNac()}','{$this->getTelefono()}','{$this->getDomicilio()}')";
        return $base->Ejecutar($sql);
    }

    // MODIFICAR
    public function modificar() {
        $base = new BaseDatos();
        $sql = "UPDATE persona SET 
                    Apellido='{$this->getApellido()}',
                    Nombre='{$this->getNombre()}',
                    fechaNac='{$this->getFechaNac()}',
                    Telefono='{$this->getTelefono()}',
                    Domicilio='{$this->getDomicilio()}'
                WHERE NroDni='{$this->getNroDNI()}'";
        return $base->Ejecutar($sql);
    }

    // ELIMINAR
    public function eliminar() {
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE NroDni = '{$this->getNroDNI()}'";
        return $base->Ejecutar($sql);
    }

    // BUSCAR 
    public function buscar($nroDNI) {
        $bool = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE NroDni = '{$nroDNI}'";

        if ($base->Ejecutar($sql) > 0) {
            $row = $base->Registro();
            $this->setNroDNI($row['NroDni']);
            $this->setApellido($row['Apellido']);
            $this->setNombre($row['Nombre']);
            $this->setFechaNac($row['fechaNac']);
            $this->setTelefono($row['Telefono']);
            $this->setDomicilio($row['Domicilio']);
            $bool = true;
        }
        return $bool;
    }
}

?>