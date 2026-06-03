<?php
require_once __DIR__ . '/../core/Database.php';

class Asistencia
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function registrar(int $id_empleado): void
{
    $sql = "INSERT INTO asistencia(id_empleado)
            VALUES(?)";

    $stmt = $this->db->prepare($sql);
    $stmt->execute([$id_empleado]);
}
   public function obtenerAsistencias()
{
    $sql = "SELECT
                a.id_asistencia,
                e.nombre,
                e.apellido,
                e.dni,
                a.fecha
            FROM asistencia a
            INNER JOIN empleado e
            ON a.id_empleado = e.id_empleado
            ORDER BY a.id_asistencia DESC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

public function contarAsistenciasHoy()
{
    $sql = "SELECT COUNT(*) AS total
            FROM asistencia
            WHERE fecha = CURDATE()";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetch();
}

}