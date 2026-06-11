<?php

require_once __DIR__ . '/../core/Database.php';

class Proveedor
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function obtenerProveedores()
    {
        $sql = "SELECT * FROM proveedores ORDER BY id DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}