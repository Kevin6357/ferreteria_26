<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';

class EmpleadosController extends Controller
{
    public function registrar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Empleado();

        $empleados = $modelo->obtenerEmpleados();

        $this->view('empleados/registrar', [
            'usuario' => $_SESSION['usuario'],
            'empleados' => $empleados
        ]);
    }

    public function reportes()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Empleado();

        $empleados = $modelo->obtenerEmpleados();

        $this->view('empleados/reportes', [
            'usuario' => $_SESSION['usuario'],
            'empleados' => $empleados
        ]);
    }

    public function guardar()
    {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $modelo = new Empleado();

        $modelo->registrar(
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['dni'],
            $_POST['celular'],
            $_POST['correo'],
            $_POST['id_cargo']
        );

        $_SESSION['mensaje'] = 'Empleado registrado correctamente';

        header('Location: ' . BASE_URL . '/empleados/registrar');
        exit;
    }
}

 public function editar($id)
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    $modelo = new Empleado();

    $empleado = $modelo->obtenerPorId($id);

    $this->view('empleados/editar', [
        'usuario' => $_SESSION['usuario'],
        'empleado' => $empleado
    ]);
}

public function actualizar($id)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $modelo = new Empleado();

        $modelo->actualizar(
            $id,
            $_POST['nombre'],
            $_POST['apellido'],
            $_POST['dni'],
            $_POST['celular'],
            $_POST['correo'],
            $_POST['id_cargo']
        );

        $_SESSION['mensaje'] = 'Empleado actualizado correctamente';

        header('Location: ' . BASE_URL . '/empleados/registrar');
        exit;
    }
}

 public function eliminar($id)
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    $modelo = new Empleado();

    $modelo->eliminar($id);

    $_SESSION['mensaje'] = 'Empleado eliminado correctamente';

    header('Location: ' . BASE_URL . '/empleados/registrar');
    exit;
}
}