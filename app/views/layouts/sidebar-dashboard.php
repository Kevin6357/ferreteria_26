<!--El archivo .htacces tiene este linea RewriteRule ^(.+)$ app/index.php?url=$1 [QSA,L] --> 
<!--Detectamos en qué pagina estamos para marcar el link activo del siderbar(inicio,producto,...)-->
<?php
$rutaActual  = explode('/', trim($_GET['url'] ?? 'dashboard', '/'))[0] ?: 'dashboard';
$esSuperAdmin = ($_SESSION['usuario']['roles'] ?? '') === 'superadmin';
?>

<!-- TOPBAR (solo visible en móvil) -->
<div class="topbar">
    <div class="title-business">
        <span><?php echo htmlspecialchars($usuario['nombre_usuario'] ?? 'Usuario'); ?></span>
    </div>
    <div class="btn-menu">
        <button class="hamburger" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>
</div>

<!-- OVERLAY -->
<div class="overlay"></div>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <?php echo htmlspecialchars($usuario['nombre_usuario'] ?? 'Usuario'); ?>
    </div>
    <ul>

        <!-- ================= DASHBOARD ================= -->
        <li>
            <a href="<?php echo BASE_URL; ?>/dashboard"
               class="<?php echo $rutaActual === 'dashboard' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-gauge-high"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <?php if ($esSuperAdmin): ?>

        <!-- ================= COMPRAS ================= -->
        <li class="<?php echo $rutaActual === 'compras' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'compras' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Compras</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/compras/registrar">
                    <i class="fa-solid fa-cart-plus"></i>
                    Registrar Compra
                </a>
                <a href="<?php echo BASE_URL; ?>/compras/reportes">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </a>
                <a href="<?php echo BASE_URL; ?>/compras/proveedores">
                    <i class="fa-solid fa-truck"></i>
                    Proveedores
                </a>
            </div>

        </li>

        <!-- ================= RECIBIDOS ================= -->
        <li class="<?php echo $rutaActual === 'recibidos' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'recibidos' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-box-open"></i>
                <span>Recibidos</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/recibidos/registrar">
                    <i class="fa-solid fa-box"></i>
                    Registrar Recibido
                </a>
                <a href="<?php echo BASE_URL; ?>/recibidos/historial">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    Historial
                </a>
            </div>

        </li>

        <?php endif; ?>

        <!-- ================= DEVOLUCIONES ================= -->
        <li class="<?php echo $rutaActual === 'devoluciones' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'devoluciones' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-rotate-left"></i>
                <span>Devoluciones</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/devoluciones/registrar">
                    <i class="fa-solid fa-arrow-rotate-left"></i>
                    Registrar Devolución
                </a>
                <a href="<?php echo BASE_URL; ?>/devoluciones/reportes">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </a>
            </div>

        </li>

        <!-- ================= STOCKS ================= -->
        <li class="<?php echo $rutaActual === 'stocks' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'stocks' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-boxes-stacked"></i>
                <span>Stocks</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/stocks/ver">
                    <i class="fa-solid fa-warehouse"></i>
                    Ver Stock
                </a>
                <a href="<?php echo BASE_URL; ?>/stocks/movimientos">
                    <i class="fa-solid fa-right-left"></i>
                    Movimientos
                </a>
                <a href="<?php echo BASE_URL; ?>/stocks/productos_bajos">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Productos Bajos
                </a>
            </div>

        </li>

        <!-- ================= EMPLEADOS ================= -->
        <li class="<?php echo $rutaActual === 'empleados' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'empleados' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-users"></i>
                <span>Empleados</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/empleados/registrar">
                    <i class="fa-solid fa-user-plus"></i>
                    Registrar
                </a>
                <a href="<?php echo BASE_URL; ?>/empleados/reportes">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </a>
            </div>

        </li>

        <!-- ================= ASISTENCIAS ================= -->
        <li class="<?php echo $rutaActual === 'asistencias' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'asistencias' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-clock"></i>
                <span>Asistencias</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/asistencias">
                    <i class="fa-solid fa-calendar-check"></i>
                    Registrar Asistencia
                </a>
                <a href="<?php echo BASE_URL; ?>/asistencias/reportes">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </a>
                <a href="<?php echo BASE_URL; ?>/asistencias/ejemplo_hoja">
                    <i class="fa-solid fa-file-circle-check"></i>
                    Ejemplo Hoja
                </a>
            </div>

        </li>

        <!-- ================= USUARIOS ================= -->
        <li class="<?php echo $rutaActual === 'usuarios' ? 'dropdown show' : 'dropdown'; ?>">
            <a href="#" class="dropbtn <?php echo $rutaActual === 'usuarios' ? 'activo' : ''; ?>">
                <i class="fa-solid fa-user-gear"></i>
                <span>Usuarios</span>
                <i class="fa-solid fa-chevron-down arrow"></i>
            </a>
            <div class="dropdown-content">
                <a href="<?php echo BASE_URL; ?>/usuarios/registrar">
                    <i class="fa-solid fa-user-plus"></i>
                    Registrar Usuario
                </a>
                <a href="<?php echo BASE_URL; ?>/usuarios/roles">
                    <i class="fa-solid fa-user-shield"></i>
                    Roles
                </a>
                <a href="<?php echo BASE_URL; ?>/usuarios/reportes">
                    <i class="fa-solid fa-file-lines"></i>
                    Reportes
                </a>
            </div>

        </li>

        <!-- ================= LOGOUT ================= -->
        <li class="nav-logout">
            <a href="<?php echo BASE_URL; ?>/logout" id="btn-logout">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>

</aside>

<script src="<?php echo BASE_URL; ?>/public/js/dropdown.js"></script>