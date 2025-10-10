<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Pais - Panel Admin</title>
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
            <?php if (empty($country)): ?>
                <section class="admin-card">
                    <h2>Pais no encontrado</h2>
                    <p class="muted">No se encontro informacion para este pais.</p>
                    <a class="btn btn-outline" href="/routes/web.php?url=countries/list"><i class="fas fa-arrow-left"></i> Volver al listado</a>
                </section>
            <?php else: ?>
                <div class="admin-header">
                    <h1><?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? 'Pais')) ?></h1>
                    <p>Creado: <?= htmlspecialchars($country['creado_en'] ?? '') ?></p>
                </div>

                <section class="admin-card">
                    <h2>Datos generales</h2>
                    <p><strong>Descripcion:</strong></p>
                    <p><?= nl2br(htmlspecialchars($country['descripcion'] ?? 'Sin descripcion')) ?></p>
                </section>

                <section class="admin-card">
                    <div class="admin-toolbar">
                        <h2>Acciones</h2>
                        <div class="admin-toolbar__actions">
                            <a class="btn btn-primary" href="/routes/web.php?url=cities/create&country_id=<?= $country['id'] ?>">
                                <i class="fas fa-plus"></i> Agregar ciudad
                            </a>
                            <a class="btn btn-outline" href="/routes/web.php?url=cities/list&country_id=<?= $country['id'] ?>">
                                <i class="fas fa-city"></i> Ver ciudades
                            </a>
                            <a class="btn btn-outline" href="/routes/web.php?url=countries/list">
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
