<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Stock</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Stocks</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Ver Stock</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-boxes-stacked"></i>
                    Ver Stock
                </h2>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                     <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($stocks as $stock): ?>

                        <tr>
                            <td><?= $stock['id_stock'] ?></td>
                            <td><?= htmlspecialchars($stock['producto']) ?></td>
                            <td><?= $stock['cantidad'] ?></td>
                            <td>S/ <?= number_format($stock['precio'],2) ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>/stocks/eliminar/<?= $stock['id_stock'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Desea eliminar este producto?')">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
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