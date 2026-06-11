<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Usuarios</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Registrar</span>
    </nav>

    <div class="main-content">
        
        <?php if(isset($_SESSION['mensaje'])): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <i class="fa-solid fa-circle-check"></i>
        <?= $_SESSION['mensaje']; ?>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>

    </div>

    <?php unset($_SESSION['mensaje']); ?>

<?php endif; ?>

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-user-plus"></i>
                    Registrar Usuario
                </h2>
            </div>

            <div class="card-body">

                <form action="<?php echo BASE_URL; ?>/usuarios/guardar" method="POST">

                    <div class="form-group">
                        <label>Usuario</label>
                        <input
                            type="text"
                            name="nombre_usuario"
                            class="form-control"
                            placeholder="Ingrese usuario"
                            required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input
                            type="password"
                            name="clave"
                            class="form-control"
                            placeholder="Ingrese contraseña"
                            required>
                    </div>

                    <br>

                    <div class="form-group">
                        <label>Rol</label>
                        <select name="roles" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="superadmin">Super Admin</option>
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Guardar Usuario
                    </button>

                  
                </form>

            </div>

        </div>

    </div>

</main>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>

</body>
</html>