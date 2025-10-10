<?php
require_once __DIR__ . '/../../helpers/auth.php';

if (!isAuthenticated()) {
    header('Location: /views/auth/login.php');
    exit();
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Wilrop Colombia Travel</title>
    <meta name="description" content="Panel de administración de Wilrop Colombia Travel. Gestiona países, ciudades, paquetes y tours.">
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">

    <!-- Fuentes e íconos -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Estilos -->
    <link rel="stylesheet" href="/assets/css/admin_panel.css">
</head>
<body>
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <div class="admin-wrapper">
        <?php include __DIR__ . '/../components/admin_sidebar.php'; ?>

        <main class="admin-content">
            <div class="admin-header">
                <h1>Panel de Administración</h1>
                <p>Bienvenido al panel. Selecciona una opción del menú lateral para comenzar.</p>
            </div>

            <div class="admin-grid">
                <div class="admin-card">
                    <h3>Países</h3>
                    <p>Gestiona los países disponibles.</p>
                    <a class="btn" href="/routes/web.php?url=countries/list">Ver países</a>
                </div>
                <div class="admin-card">
                    <h3>Ciudades</h3>
                    <p>Gestiona las ciudades por país.</p>
                    <a class="btn" href="/routes/web.php?url=cities/list">Ver ciudades</a>
                </div>
                <div class="admin-card">
                    <h3>Paquetes</h3>
                    <p>Administra paquetes y precios.</p>
                    <a class="btn" href="/routes/web.php?url=packages/list">Ver paquetes</a>
                </div>
                <div class="admin-card">
                    <h3>Tours</h3>
                    <p>Gestiona tours y actividades.</p>
                    <a class="btn" href="/routes/web.php?url=tours/list">Ver tours</a>
                </div>
            </div>
        </main>
    </div>
    <script src="/assets/js/scripts.js"></script>
</body>
</html>
