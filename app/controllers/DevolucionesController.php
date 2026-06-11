<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Devoluciones.php';

class DevolucionesController extends Controller
{
    public function registrar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Devolucion();

        $devoluciones = $modelo->obtenerDevoluciones();

        $this->view('devoluciones/registrar', [
            'usuario' => $_SESSION['usuario'],
            'devoluciones' => $devoluciones
        ]);
    }

    public function reportes()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Devolucion();

        $devoluciones = $modelo->obtenerDevoluciones();

        $this->view('devoluciones/reportes', [
            'usuario' => $_SESSION['usuario'],
            'devoluciones' => $devoluciones
        ]);
    }
}