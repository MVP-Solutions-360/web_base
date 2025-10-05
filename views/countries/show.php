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
    <title>Detalle de País - Panel Admin</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .card { background: var(--bg-white); border:1px solid var(--border-color); border-radius:12px; padding:1.25rem; box-shadow: var(--shadow); }
        .card h2 { margin: 0 0 .5rem 0; }
        .muted { color: var(--text-light); }
        .actions { display:flex; gap:.5rem; flex-wrap: wrap; margin-top: 1rem; }
        .btn-outline { border:1px solid var(--border-color); background: white; color: var(--text-dark); }
    </style>
</head>
<body>
    <?php include __DIR__ . "/../components/navbar.php"; ?>
    <div class="admin-layout">
        <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>
        <main class="admin-content">
            <?php if (empty($country)): ?>
                <div class="card">
                    <h2>País no encontrado</h2>
                    <p class="muted">No se encontró información para este país.</p>
                    <div class="actions">
                        <a class="btn btn-outline" href="/routes/web.php?url=countries/list"><i class="fas fa-arrow-left"></i> Volver al listado</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="card">
                    <h2><?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? 'País')) ?></h2>
                    <p class="muted">Creado: <?= htmlspecialchars($country['creado_en'] ?? '') ?></p>
                    <p><?= nl2br(htmlspecialchars($country['descripcion'] ?? 'Sin descripción')) ?></p>
                    <div class="actions">
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
            <?php endif; ?>
        </main>
    </div>
    <?php include __DIR__ . "/../components/footer.php"; ?>
</body>
</html>

