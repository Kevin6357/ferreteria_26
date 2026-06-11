<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Compras</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Proveedores</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-truck"></i>
                    Lista de Proveedores
                </h2>
            </div>

            <div class="table-responsive">
                    <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach ($proveedores as $proveedor): ?>

                        <tr>
                            <td><?= $proveedor['id'] ?></td>
                            <td><?= htmlspecialchars($proveedor['nombre']) ?></td>
                            <td><?= htmlspecialchars($proveedor['telefono']) ?></td>
                            <td><?= htmlspecialchars($proveedor['direccion']) ?></td>
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