<?php if (!isset($package)) { $package = null; } ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Paquete - Panel Admin</title>
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
            <?php if (empty($package)): ?>
                <section class="admin-card"><h2>Paquete no encontrado</h2></section>
            <?php else: ?>
                <div class="admin-header">
                    <h1><?= htmlspecialchars($package['nombre'] ?? ($package['name'] ?? 'Paquete')) ?></h1>
                    <p>Ciudad: <?= htmlspecialchars($package['ciudad'] ?? ($package['city_name'] ?? '')) ?></p>
                </div>
                <section class="admin-card">
                    <h2>Datos generales</h2>
                    <p><strong>Descripcion:</strong></p>
                    <p><?= nl2br(htmlspecialchars($package['descripcion'] ?? 'Sin descripcion')) ?></p>
                </section>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
