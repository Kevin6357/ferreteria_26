<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Stock.php';

class StocksController extends Controller
{
    public function ver()
    {
        $modelo = new Stock();

        $stocks = $modelo->obtenerStocks();

        $this->view('stocks/ver', [
            'usuario' => $_SESSION['usuario'],
            'stocks' => $stocks
        ]);
    }

    public function movimientos()
    {
        $modelo = new Stock();

        $stocks = $modelo->obtenerStocks();

        $this->view('stocks/movimientos', [
            'usuario' => $_SESSION['usuario'],
            'stocks' => $stocks
        ]);
    }

    public function productos_bajos()
    {
        $modelo = new Stock();

        $stocks = $modelo->obtenerProductosBajos();

        $this->view('stocks/productos_bajos', [
            'usuario' => $_SESSION['usuario'],
            'stocks' => $stocks
        ]);
    }

    public function eliminar($id)
{
    $modelo = new Stock();

    $modelo->eliminar($id);

    $_SESSION['mensaje'] = 'Producto eliminado correctamente';

    header('Location: ' . BASE_URL . '/stocks/verstock');
    exit;
}

}