<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE_BUSINESS ?> - Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Inicio</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Dashboard</span>
    </nav>

    <div class="main-content">

        <!-- BIENVENIDA -->
        <div class="card mb-4">
            <div class="card-body">
                <h2>
                    <i class="fa-solid fa-house"></i>
                    Bienvenido, <?= htmlspecialchars($usuario['nombre_usuario']) ?>
                </h2>

                <p>
                    Sistema de Gestión de Asistencia e Inventario para Ferretería Bayron.
                </p>
            </div>
        </div>

        <!-- TARJETAS -->
        <div class="dashboard-cards">

            <div class="dashboard-card">
                <i class="fa-solid fa-users"></i>
                <h3>Empleados</h3>
                <span><?= $totalEmpleados['total'] ?></span>
            </div>

            <div class="dashboard-card">
                <i class="fa-solid fa-calendar-check"></i>
                <h3>Asistencias</h3>
                <span><?= $totalAsistencias['total'] ?></span>
            </div>

            <div class="dashboard-card">
                <i class="fa-solid fa-boxes-stacked"></i>
                <h3>Stock</h3>
                <span><?= $totalStock['total'] ?? 0 ?></span>   
            </div>

            <div class="dashboard-card">
                <i class="fa-solid fa-user-shield"></i>
                <h3>Usuarios</h3>
                <span><?= $totalUsuarios['total'] ?></span>
            </div>

        </div>

        <!-- ACCESOS RAPIDOS -->
        <div class="card mt-4">

            <div class="card-header">
                <h2>Accesos Rápidos</h2>
            </div>

            <div class="quick-actions">

                <a href="<?= BASE_URL ?>/empleados/registrar" class="action-btn">
                    <i class="fa-solid fa-user-plus"></i>
                    Empleados
                </a>

                <a href="<?= BASE_URL ?>/compras/registrar" class="action-btn">
                    <i class="fa-solid fa-cart-plus"></i>
                    Compras
                </a>

                <a href="<?= BASE_URL ?>/stocks/ver" class="action-btn">
                    <i class="fa-solid fa-box"></i>
                    Stock
                </a>

                <a href="<?= BASE_URL ?>/usuarios/registrar" class="action-btn">
                    <i class="fa-solid fa-user-gear"></i>
                    Usuarios
                </a>

            </div>

        </div>

    </div>

</main>

<script src="<?= BASE_URL ?>/public/js/dashboard.js"></script>

</body>
</html>