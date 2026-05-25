<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';

// Controlador para el módulo de empleados.
class EmpleadosController extends Controller {

    public function index(): void {
        $this->reporte();
    }

    public function reporte(): void {
        if (!isset($_SESSION['usuario'])) {
            header("Location: " . BASE_URL . "/login");
            exit();
        }
        $this->soloSuperAdmin();

        // Cargamos el modelo y obtenemos los datos de empleados.
        $modelo = new Empleado();
        $variable_empleados = $modelo->obtenerEmpleados();

        // Enviamos los datos a la vista.
        $this->view('empleados/reportes', [
            'usuario' => $_SESSION['usuario'],
            'empleados' => $variable_empleados
        ]);
    }

    public function reportes(): void {
        $this->reporte();
    }

}
