<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Empleado.php';
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Asistencia.php';
require_once __DIR__ . '/../models/Stock.php';

class DashboardController extends Controller
{
    public function index(): void
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $empleadoModel = new Empleado();
        $usuarioModel = new Usuario();
        $asistenciaModel = new Asistencia();
        $stockModel = new Stock();

        $totalEmpleados = $empleadoModel->contarEmpleados();
        $totalUsuarios = $usuarioModel->contarUsuarios();
        $totalAsistencias = $asistenciaModel->contarAsistenciasHoy();
        $totalStock = $stockModel->contarStockTotal();

        $this->view('dashboard/index', [
            'usuario' => $_SESSION['usuario'],
            'totalEmpleados' => $totalEmpleados,
            'totalUsuarios' => $totalUsuarios,
            'totalAsistencias' => $totalAsistencias,
            'totalStock' => $totalStock,
        ]);
    }
}