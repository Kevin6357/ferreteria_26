<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles de Usuarios</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Usuarios</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Roles</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-user-shield"></i>
                    Roles de Usuarios
                </h2>
            </div>

            <div class="card-body">

               <div class="table-responsive">
                    
                     <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                             <th>Acciones</th>
                        </tr>   
                    </thead>

                    <tbody>

                    <?php foreach($usuarios as $u): ?>

    <tr>
        <td><?= $u['id_usuario'] ?></td>
        <td><?= htmlspecialchars($u['nombre_usuario']) ?></td>
        <td><?= ucfirst($u['roles']) ?></td>

        <td>

            <a href="<?= BASE_URL ?>/usuarios/eliminar/<?= $u['id_usuario'] ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('¿Desea eliminar este usuario?')">

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

<script src="<?= BASE_URL ?>/public/js/dashboard.js"></script>

</body>
</html>