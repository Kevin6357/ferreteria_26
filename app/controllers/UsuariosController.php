<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Usuario.php';

class UsuariosController extends Controller
{
    public function index(): void
    {
        $this->registrar();
    }

    public function registrar(): void
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $this->view('usuarios/registrar', [
            'usuario' => $_SESSION['usuario']
        ]);
    }

    public function roles(): void
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Usuario();

        $usuarios = $modelo->obtenerRoles();

        $this->view('usuarios/roles', [
            'usuario' => $_SESSION['usuario'],
            'usuarios' => $usuarios
        ]);
    }

public function reportes(): void
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    $modelo = new Usuario();

    $totalUsuarios = $modelo->contarUsuarios();

    $this->view('usuarios/reportes', [
        'usuario' => $_SESSION['usuario'],
        'totalUsuarios' => $totalUsuarios
    ]);
}

public function guardar(): void
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    $nombre_usuario = $_POST['nombre_usuario'];
    $clave = $_POST['clave'];
    $roles = $_POST['roles'];

    $modelo = new Usuario();

    $modelo->registrar(
        $nombre_usuario,
        $clave,
        $roles
    );
    
    $_SESSION['mensaje'] = 'Usuario registrado correctamente';
    header('Location: ' . BASE_URL . '/usuarios/roles');
    exit;
}

public function eliminar($id)
{
    $modelo = new Usuario();

    $modelo->eliminar($id);

    $_SESSION['mensaje'] = 'Usuario eliminado correctamente';

    header('Location: ' . BASE_URL . '/usuarios/roles');
    exit;
}
}