<?php

require_once __DIR__ . '/../core/Database.php';

class Devolucion
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function obtenerDevoluciones()
    {
        $sql = "SELECT
                    d.id_devolucion,
                    d.id_compra,
                    d.motivo,
                    d.fecha_devolucion
                FROM devoluciones d
                ORDER BY d.id_devolucion DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}