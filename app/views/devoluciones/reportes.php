<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet"
        href="<?php echo BASE_URL; ?>/public/css/dashboard.css">

    <title>Reporte de Devoluciones</title>
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-file-lines"></i>
                    Reporte de Devoluciones
                </h2>
            </div>

            <div class="card-body">

                <p>
                    <strong>Total de devoluciones:</strong>
                    <?= count($devoluciones) ?>
                </p>

                <div class="table-responsive">
                     <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Compra</th>
                            <th>Motivo</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($devoluciones as $d): ?>

                        <tr>
                            <td><?= $d['id_devolucion'] ?></td>
                            <td><?= $d['id_compra'] ?></td>
                            <td><?= htmlspecialchars($d['motivo']) ?></td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

</body>
</html>