<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Empleados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/dashboard.css">
</head>

<body>

<?php include __DIR__ . '/../layouts/sidebar-dashboard.php'; ?>

<main>

    <nav class="breadcrumb">
        <span>Empleados</span>
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

        <!-- FORMULARIO -->
        <div class="card mb-4">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-user-plus"></i>
                    Registrar Empleado
                </h2>
            </div>

            <div class="card-body">

                <form action="<?= BASE_URL ?>/empleados/guardar" method="POST">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellido</label>
                            <input type="text"
                                   name="apellido"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">DNI</label>
                            <input type="text"
                                   name="dni"
                                   class="form-control"
                                   maxlength="8"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Celular</label>
                            <input type="text"
                                   name="celular"
                                   maxlength="9"
                                   class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email"
                                   name="correo"
                                   class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Cargo</label>

                            <select name="id_cargo"
                                    class="form-select"
                                    required>

                                <option value="">Seleccione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Empleado</option>

                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i>
                        Guardar
                    </button>

                </form>

            </div>

        </div>

        <!-- TABLA -->
        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="fa-solid fa-users"></i>
                    Lista de Empleados
                </h2>
            </div>

            <div class="card-body">
               <div class="mb-3">
        <input
            type="text"
            id="buscarTabla"
            class="form-control"
            placeholder="Buscar empleado por nombre, DNI o cargo..."
        >
    </div>
               <div class="table-responsive">
                     <table class="table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Cargo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($empleados as $empleado): ?>

                        <tr>
                            <td><?= $empleado['id_empleado'] ?></td>
                            <td><?= htmlspecialchars($empleado['nombre'] . ' ' . $empleado['apellido']) ?></td>
                            <td><?= $empleado['dni'] ?></td>
                            <td><?= $empleado['celular'] ?></td>
                            <td><?= $empleado['nombre_cargo'] ?></td>
                            <td><a href="<?= BASE_URL ?>/empleados/editar/<?= $empleado['id_empleado'] ?>"
                                   class="btn btn-warning btn-sm">
                                     <i class="fa-solid fa-pen"></i>
                                </a>
                                <a href="<?= BASE_URL ?>/empleados/eliminar/<?= $empleado['id_empleado'] ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
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
<script>
document.getElementById('buscarTabla').addEventListener('keyup', function() {

    let filtro = this.value.toLowerCase();

    let filas = document.querySelectorAll('tbody tr');

    filas.forEach(function(fila) {

        let texto = fila.textContent.toLowerCase();

        if(texto.includes(filtro)){
            fila.style.display = '';
        }else{
            fila.style.display = 'none';
        }

    });

});
</script>

<script src="<?php echo BASE_URL; ?>/public/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>