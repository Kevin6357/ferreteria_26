<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Recibidos</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>Registrar Recibidos</h2>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Compra</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($recibidos as $r): ?>

                        <tr>
                            <td><?= $r['id_recibido'] ?></td>
                            <td><?= $r['id_compra'] ?></td>
                            <td><?= $r['fecha_recibido'] ?></td>
                            <td><?= $r['estado'] ?></td>
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