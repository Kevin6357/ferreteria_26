<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Compra.php';

class ComprasController extends Controller
{
    public function index()
    {
        header('Location: ' . BASE_URL . '/compras/registrar');
        exit;
    }

    public function registrar()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Compra();

        $compras = $modelo->obtenerCompras();

        $this->view('compras/index', [
            'usuario' => $_SESSION['usuario'],
            'compras' => $compras
        ]);
    }

    public function reportes()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        $modelo = new Compra();

        $compras = $modelo->obtenerCompras();

        $this->view('compras/reportes', [
            'usuario' => $_SESSION['usuario'],
            'compras' => $compras
        ]);
    }

    public function proveedores()
    {
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }

        require_once __DIR__ . '/../models/Proveedor.php';

        $modelo = new Proveedor();

        $proveedores = $modelo->obtenerProveedores();

        $this->view('compras/proveedores', [
            'usuario' => $_SESSION['usuario'],
            'proveedores' => $proveedores
        ]);
    }

   public function eliminar($id)
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    $modelo = new Compra();

    if ($modelo->eliminar((int)$id)) {
        $_SESSION['success'] = 'Compra eliminada correctamente.';
    } else {
        $_SESSION['error'] = 'No se puede eliminar la compra porque tiene devoluciones registradas.';
    }

    header('Location: ' . BASE_URL . '/compras/registrar');
    exit;
}
   public function editar($id)
{
    if (!isset($_SESSION['usuario'])) {
        header('Location: ' . BASE_URL . '/login');
        exit;
    }

    require_once __DIR__ . '/../models/Proveedor.php';

    $compraModel = new Compra();
    $proveedorModel = new Proveedor();

    $compra = $compraModel->obtenerPorId($id);
    $proveedores = $proveedorModel->obtenerProveedores();

    $this->view('compras/editar', [
        'usuario' => $_SESSION['usuario'],
        'compra' => $compra,
        'proveedores' => $proveedores
    ]);
}
 
public function actualizar()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $modelo = new Compra();

        $modelo->actualizar(
            $_POST['id_compra'],
            $_POST['id_proveedor'],
            $_POST['total']
        );

        header('Location: ' . BASE_URL . '/compras/registrar');
        exit;
    }
}
  
}