<?php

require_once __DIR__ . '/../core/Database.php';

class Recibido
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function obtenerRecibidos()
    {
        $sql = "SELECT
                    r.id_recibido,
                    r.fecha_recibido,
                    r.estado,
                    c.id_compra
                FROM recibidos r
                INNER JOIN compras c
                    ON r.id_compra = c.id_compra
                ORDER BY r.id_recibido DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}