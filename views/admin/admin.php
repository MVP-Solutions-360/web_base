<?php
// Puedes agregar lógica PHP aquí si lo necesitas en el futuro
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colombia - Wilrop Colombia Travel</title>
    <meta name="description" content="Descubre Colombia con Wilrop Colombia Travel. Diversidad cultural, paisajes únicos, café de calidad mundial y la calidez de su gente.">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <!-- Main Content -->
    <div class="admin-layout">
        <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>
        <main class="admin-content">
            <h1>Panel de Administración</h1>
            <p>Bienvenido al panel. Selecciona una opción del menú lateral para comenzar.</p>
            <div class="admin-widgets">
                <div class="admin-card">
                    <h3>Países</h3>
                    <p>Gestiona los países disponibles.</p>
                    <a class="btn btn-primary" href="/routes/web.php?url=countries/list">Ver países</a>
                </div>
                <div class="admin-card">
                    <h3>Ciudades</h3>
                    <p>Gestiona las ciudades por país.</p>
                    <a class="btn btn-primary" href="/routes/web.php?url=cities/list">Ver ciudades</a>
                </div>
                <div class="admin-card">
                    <h3>Paquetes</h3>
                    <p>Administra paquetes y precios.</p>
                    <a class="btn btn-primary" href="/routes/web.php?url=packages/list">Ver paquetes</a>
                </div>
                <div class="admin-card">
                    <h3>Tours</h3>
                    <p>Gestiona tours y actividades.</p>
                    <a class="btn btn-primary" href="/routes/web.php?url=tours/list">Ver tours</a>
                </div>
            </div>
        </main>
    </div>
    <!-- Footer -->
    <?php include __DIR__ . "/../components/footer.php"; ?>

    <script src="/assets/js/scripts.js"></script>
</body>

</html>
