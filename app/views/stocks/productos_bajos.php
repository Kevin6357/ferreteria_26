<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos con Stock Bajo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Stocks</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Productos Bajos</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    Productos con Stock Bajo
                </h2>
            </div>

            <div class="card-body">

                <p>
                    Productos con menos de <strong>30 unidades</strong>.
                </p>

                <div class="table-responsive">
                     <table class="table">

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if (!empty($stocks)): ?>

                        <?php foreach($stocks as $stock): ?>

                            <tr>
                                <td><?= htmlspecialchars($stock['producto']) ?></td>
                                <td><?= $stock['cantidad'] ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="2" style="text-align:center;">
                                No hay productos con stock bajo.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>
</html> 