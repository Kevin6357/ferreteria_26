<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Asistencias</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Asistencias</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Reportes</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-calendar-check"></i>
                    Reporte de Asistencias
                </h2>
            </div>

            <div class="table-responsive">
                     <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empleado</th>
                            <th>DNI</th>
                            <th>Fecha y Hora</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($asistencias as $a): ?>

                        <tr>
                            <td><?= $a['id_asistencia'] ?></td>

                            <td>
                                <?= htmlspecialchars($a['nombre'] . ' ' . $a['apellido']) ?>
                            </td>

                            <td><?= $a['dni'] ?></td>

                            <td><?= $a['fecha'] ?></td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

<script src="<?= BASE_URL ?>/public/js/dashboard.js"></script>

</body>
</html>