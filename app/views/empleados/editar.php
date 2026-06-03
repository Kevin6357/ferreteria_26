<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Empleados</span>
        <i class="fa-solid fa-chevron-right"></i>
        <span>Editar</span>
    </nav>

    <div class="main-content">

        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-user-pen"></i>
                    Editar Empleado
                </h2>
            </div>

            <div class="card-body">

                <form action="<?= BASE_URL ?>/empleados/actualizar/<?= $empleado['id_empleado'] ?>" method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   value="<?= htmlspecialchars($empleado['nombre']) ?>"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text"
                                   name="apellido"
                                   class="form-control"
                                   value="<?= htmlspecialchars($empleado['apellido']) ?>"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text"
                                   name="dni"
                                   class="form-control"
                                   value="<?= $empleado['dni'] ?>"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Celular</label>
                            <input type="text"
                                   name="celular"
                                   class="form-control"
                                   value="<?= $empleado['celular'] ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email"
                                   name="correo"
                                   class="form-control"
                                   value="<?= $empleado['correo'] ?>">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>

                            <select name="id_cargo" class="form-select">

                                <option value="1"
                                    <?= $empleado['id_cargo'] == 1 ? 'selected' : '' ?>>
                                    Administrador
                                </option>

                                <option value="2"
                                    <?= $empleado['id_cargo'] == 2 ? 'selected' : '' ?>>
                                    Empleado
                                </option>

                            </select>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="fa-solid fa-floppy-disk"></i>
                        Actualizar
                    </button>

                    <a href="<?= BASE_URL ?>/empleados/registrar"
                       class="btn btn-secondary">
                        Volver
                    </a>

                </form>

            </div>

        </div>

    </div>

</main>

<script src="<?= BASE_URL ?>/public/js/dashboard.js"></script>

</body>
</html>