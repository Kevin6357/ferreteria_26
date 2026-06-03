<?php

require_once __DIR__ . '/../core/Database.php';

class Usuario
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function obtenerRoles()
    {
        $sql = "SELECT id_usuario, nombre_usuario, roles
                FROM usuario
                ORDER BY id_usuario DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function contarUsuarios()
    {
        $sql = "SELECT COUNT(*) AS total FROM usuario";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function registrar($nombre_usuario, $clave, $roles)
    {
        $sql = "INSERT INTO usuario
                (nombre_usuario, clave, roles)
                VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $nombre_usuario,
            password_hash($clave, PASSWORD_DEFAULT),
            $roles
        ]);
    }

    public function eliminar($id)
{
    $sql = "DELETE FROM usuario WHERE id_usuario = ?";

    $stmt = $this->db->prepare($sql);

    return $stmt->execute([$id]);
}
}