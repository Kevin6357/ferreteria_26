<?php

require_once __DIR__ . '/../core/Database.php';

class Stock
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function obtenerStocks()
    {
        $sql = "SELECT * FROM stocks ORDER BY producto";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function obtenerProductosBajos()
    {
        $sql = "SELECT * FROM stocks WHERE cantidad < 30";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function contarStockTotal()
{
    $sql = "SELECT SUM(cantidad) AS total FROM stocks";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();

    return $stmt->fetch();
}

public function eliminar($id)
{
    $sql = "DELETE FROM stocks WHERE id_stock = ?";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([$id]);
}
}