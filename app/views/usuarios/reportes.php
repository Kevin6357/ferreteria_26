<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Usuarios</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Usuarios</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Reportes</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-chart-column"></i>
                    Reporte de Usuarios
                </h2>
            </div>

            <div class="card-body">

                <div class="dashboard-card">
                    <h3>Total de Usuarios Registrados</h3>

                    <p style="font-size: 32px; font-weight: bold;">
                        <?= $totalUsuarios['total'] ?>
                    </p>
                </div>

            </div>

        </div>

    </div>

</main>

<script src="<?= BASE_URL ?>/public/js/dashboard.js"></script>

</body>
</html>