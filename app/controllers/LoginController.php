<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Login.php';

class LoginController extends Controller {

    public function index(): void {

        /* INICIAR SESION */
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $error = null;

        /* VALIDAR POST */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = trim($_POST['user'] ?? '');
            $clave   = trim($_POST['pass'] ?? '');

            /* VALIDAR CAMPOS */
            if (empty($usuario) || empty($clave)) {

                $error = "Completa todos los campos.";

            } else {

                /* LOGIN */
                $resultado = (new Login())->login($usuario, $clave);

                if ($resultado) {

                    /* GUARDAR SESION */
                    $_SESSION['usuario'] = $resultado;

                    /* REDIRECCION */
                    header('Location: ' . BASE_URL . '/dashboard');

                    exit;

                } else {

                    $error = "Usuario o contraseña incorrectos.";

                }
            }
        }

        /* CARGAR VISTA */
        $this->view('auth/login', [
            'error' => $error
        ]);
    }
}