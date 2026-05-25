<?php 
//Llamamos a la conexión de la base de datos.
require_once __DIR__ . '/../core/Database.php';
//Creamos el modelo o clase llamada Empleado (SINGULAR).
class Empleado{
    // La propiedad $db guardará la conexión PDO.
    // Le decimos que solo puede ser de tipo PDO (tipado estricto).
    // modificador de acceso("private") significa que solo se puede usar dentro de esta clase.
    private PDO $db;

    //Al crear el modelo, obtenemos la conexion automaticamente.
    public function __construct(){
        // Database::getConnection() nos regresa la conexión PDO que creamos en core/Database.php.
        // Al guardarla en $this->db, cualquier método de esta clase puede usarla.
        $this->db = Database::getConnection();
    }
    //Creamos el modulo para llamar todo los datos de la tabla EMPLEADOS
    //public function getAll():array
    public function obtenerEmpleados():array {
        // variable $sql para almacenar
        $sql = "SELECT * FROM empleado
                INNER JOIN cargo 
                ON empleado.id_cargo = cargo.id_cargo 
                ORDER BY empleado.id_cargo DESC 
                "; 
        // statement = declaración
        $stmt = $this->db->prepare($sql);
        // Ejecutamos la declaración ($stmt)
        $stmt->execute();
        //Retornamos los datos
        return $stmt->fetchAll();
    }

    //Creamos un modulo para llamar a UN empleado por DNI.
    public function buscarPorDni(String $dni){
        // variable $sql para almacenar  
        $sql = "SELECT * FROM empleado WHERE dni = ?"; 
        // statement = declaración
        $stmt = $this->db->prepare($sql);
        // Ejecutamos la declaración ($stmt)
        $stmt->execute([$dni]);
        //Retornamos los datos -- fetch -> devuelve 1 valor - 1 dato
        return $stmt->fetch();
    }

}

