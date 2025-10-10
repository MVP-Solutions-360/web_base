<?php
if (!isset($city)) { $city = null; }
if (!isset($country)) { $country = null; }
if (!isset($db_error)) { $db_error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Ciudad - Panel Admin</title>
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/admin_panel.css">
    <link rel="stylesheet" href="/assets/css/admin-table.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <div class="admin-wrapper">
        <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>

        <main class="admin-content">
            <?php if (!empty($db_error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($db_error) ?>
                </div>
            <?php endif; ?>

            <?php if (empty($city)): ?>
                <section class="admin-card">
                    <h2>Ciudad no encontrada</h2>
                    <p class="muted">No se encontro informacion para la ciudad solicitada.</p>
                    <a class="btn btn-outline" href="/routes/web.php?url=cities/list">
                        <i class="fas fa-arrow-left"></i> Volver al listado
                    </a>
                </section>
            <?php else: ?>
                <div class="admin-header">
                    <h1><?= htmlspecialchars($city['ciudad'] ?? 'Ciudad') ?></h1>
                    <p>Registrada el <?= htmlspecialchars($city['creado_en'] ?? '') ?></p>
                </div>

                <section class="admin-card">
                    <h2>Datos generales</h2>
                    <p><strong>Pais:</strong> <?= htmlspecialchars(($country['pais'] ?? $city['pais']) ?? 'Sin asignar') ?></p>
                    <p><strong>Descripcion:</strong></p>
                    <p><?= nl2br(htmlspecialchars($city['descripcion'] ?? 'Sin descripcion')) ?></p>
                </section>

                <?php $returnUrl = '/routes/web.php?url=cities/list' . (isset($city['pais_id']) ? '&country_id=' . (int) $city['pais_id'] : ''); ?>
                <section class="admin-card">
                    <div class="admin-toolbar">
                        <h2>Acciones</h2>
                        <div class="admin-toolbar__actions">
                            <a class="btn btn-primary" href="/routes/web.php?url=cities/edit&id=<?= $city['id'] ?>">
                                <i class="fas fa-pen"></i> Editar ciudad
                            </a>
                            <a class="btn btn-outline" href="<?= htmlspecialchars($returnUrl, ENT_QUOTES) ?>">
                                <i class="fas fa-arrow-left"></i> Volver al listado
                            </a>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </main>
    </div>
    <script src="/assets/js/scripts.js"></script>
</body>
</html>
