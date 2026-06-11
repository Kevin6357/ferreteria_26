<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/dashboard.css">
</head>
<body>
<div class="container mt-4">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white py-3">
                    <h3 class="mb-0">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Editar Compra
                    </h3>
                </div>

                <div class="card-body p-4">

                    <form action="<?= BASE_URL ?>/compras/actualizar" method="POST">

                        <input type="hidden"
                               name="id_compra"
                               value="<?= $compra['id_compra'] ?>">

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-truck"></i>
                                Proveedor
                            </label>

                            <select name="id_proveedor"
                                    class="form-select"
                                    required>

                                <?php foreach($proveedores as $p): ?>

                                    <option value="<?= $p['id'] ?>"
                                        <?= $p['id'] == $compra['id_proveedor'] ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($p['nombre']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-bold">
                                <i class="fa-solid fa-money-bill-wave"></i>
                                Total de la Compra
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    S/
                                </span>

                                <input type="number"
                                       step="0.01"
                                       min="0"
                                       name="total"
                                       value="<?= $compra['total'] ?>"
                                       class="form-control"
                                       required>

                            </div>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <a href="<?= BASE_URL ?>/compras/registrar"
                               class="btn btn-secondary">

                                <i class="fa-solid fa-arrow-left"></i>
                                Volver

                            </a>

                            <button type="submit"
                                    class="btn btn-success">

                                <i class="fa-solid fa-floppy-disk"></i>
                                Actualizar Compra

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>