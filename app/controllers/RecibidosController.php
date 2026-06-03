<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Recibido.php';

class RecibidosController extends Controller
{
    public function registrar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Recibido();

        $recibidos = $modelo->obtenerRecibidos();

        $this->view('recibidos/registrar', [
            'usuario' => $_SESSION['usuario'],
            'recibidos' => $recibidos
        ]);
    }

    public function historial()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Recibido();

        $recibidos = $modelo->obtenerRecibidos();

        $this->view('recibidos/historial', [
            'usuario' => $_SESSION['usuario'],
            'recibidos' => $recibidos
        ]);
    }
}