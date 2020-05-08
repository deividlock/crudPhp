<?php
include ('conexion.php');
class empleado {

    private $id;
    private $dni;
    private $nombre;
    private $apellido;
    private $tlefono;
    private $con;
    function __construct () {
        $con = new conexion();
        $this->con = $con->getCon();
    }
    public function obtenerTodos() {
        $sql = "SELECT * FROM empleado"; 
        $query = $this->con->prepare($sql); 
        $query->execute(); 
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function obtenerEmpleado($id) {
        $sql = "SELECT * FROM empleado WHERE id = :id"; 
        $sql = $this->con->prepare($sql); 
        $sql->bindParam(':id',$id,PDO::PARAM_INT, 25);
        $sql->execute(); 
        $results = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function guardarEmpleado() {
        $sql="insert into empleado(dni,nombre,apellido,telefono) values(:dni,:nombre,:apellido,:telefono)";

        $sql = $this->con->prepare($sql);

        $sql->bindParam(':dni',$this->dni,PDO::PARAM_INT, 25);
        $sql->bindParam(':nombre',$this->nombre,PDO::PARAM_STR, 25);
        $sql->bindParam(':apellido',$this->apellido,PDO::PARAM_STR, 25);
        $sql->bindParam(':telefono',$this->telefono,PDO::PARAM_STR,25);

        $sql->execute();
    }
    public function actualizarEmpleado() {
        $sql = "UPDATE empleado
        SET `dni` = :dni, `nombre`= :nombre, `apellido` = :apellido, `telefono` = :telefono
        WHERE `id` = :id";
    
        $sql = $this->con->prepare($sql);

        $sql->bindParam(':id',$this->id,PDO::PARAM_INT, 25);
        $sql->bindParam(':dni',$this->dni,PDO::PARAM_INT, 25);
        $sql->bindParam(':nombre',$this->nombre,PDO::PARAM_STR, 25);
        $sql->bindParam(':apellido',$this->apellido,PDO::PARAM_STR, 25);
        $sql->bindParam(':telefono',$this->telefono,PDO::PARAM_STR,25);

        $sql->execute();
    }
    public function eliminarEmpleado() {
        $sql = "DELETE FROM `empleado` WHERE `id`=:id";
        $sql = $this->con->prepare($sql);
        $sql->bindParam(':id', $this->id, PDO::PARAM_INT);
        $sql->execute();
    }
    public function obtenerDatos() {
        if(isset($_POST['id']))
            $this->id = $_POST['id'];
        $this->dni = $_POST['dni'];
        $this->nombre = $_POST['nombre'];
        $this->apellido = $_POST['apellido'];
        $this->telefono = $_POST['telefono'];
    }
}