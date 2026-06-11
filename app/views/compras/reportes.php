<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Compras</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Compras</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Reportes</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-file-lines"></i>
                    Reporte de Compras
                </h2>
            </div>

            <div class="card-body">

                <?php
                $totalGeneral = 0;

                foreach ($compras as $compra) {
                    $totalGeneral += $compra['total'];
                }
                ?>

                <p><strong>Total de compras:</strong> <?= count($compras) ?></p>

                <p>
                    <strong>Monto total comprado:</strong>
                    S/ <?= number_format($totalGeneral, 2) ?>
                </p>

                <hr>

                <h3>Últimas Compras</h3>

                <div class="table-responsive">
                    <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proveedor</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($compras as $compra): ?>

                        <tr>
                            <td><?= $compra['id_compra'] ?></td>
                            <td><?= htmlspecialchars($compra['proveedor']) ?></td>
                            <td>S/ <?= number_format($compra['total'], 2) ?></td>
                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>
</html>