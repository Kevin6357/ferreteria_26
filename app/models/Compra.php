<?php

require_once __DIR__ . '/../core/Database.php';

class Compra
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function obtenerCompras()
    {
        $sql = "SELECT 
                    c.id_compra,
                    p.nombre AS proveedor,
                    c.fecha_compra,
                    c.total
                FROM compras c
                INNER JOIN proveedores p
                    ON c.id_proveedor = p.id
                ORDER BY c.id_compra DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function eliminar($id)
{
    $sql = "DELETE FROM compras WHERE id_compra = ?";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([$id]);
}

 public function obtenerPorId($id)
{
    $sql = "SELECT * FROM compras WHERE id_compra = ?";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch();
}

public function actualizar($id, $id_proveedor, $total)
{
    $sql = "UPDATE compras
            SET id_proveedor = ?, total = ?
            WHERE id_compra = ?";

    $stmt = $this->conexion->prepare($sql);

    return $stmt->execute([
        $id_proveedor,
        $total,
        $id
    ]);
}
}