<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$current = $_SERVER['REQUEST_URI'] ?? '';
if (!function_exists('is_active')) {
    function is_active($needle) {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        return strpos($uri, $needle) !== false ? 'active' : '';
    }
}
?>
<aside class="admin-sidebar">
    <div class="admin-sidebar__header">
        <div class="admin-user">
            <i class="fas fa-user-circle"></i>
            <div class="admin-user__info">
                <span class="admin-user__name"><?php echo htmlspecialchars($_SESSION['nombre'] ?? 'Administrador'); ?></span>
                <small class="admin-user__email"><?php echo htmlspecialchars($_SESSION['correo'] ?? ''); ?></small>
            </div>
        </div>
    </div>

    <nav class="admin-menu">
        <a class="admin-menu__item <?php echo is_active('/routes/web.php?url=admin'); ?>" href="/routes/web.php?url=admin">
            <i class="fas fa-gauge"></i> <span>Dashboard</span>
        </a>
        <div class="admin-menu__group">
            <div class="admin-menu__group-title"><i class="fas fa-flag"></i> <span>Países</span></div>
            <a class="admin-menu__subitem <?php echo is_active('countries/list'); ?>" href="/routes/web.php?url=countries/list">Listado</a>
            <a class="admin-menu__subitem <?php echo is_active('countries/create'); ?>" href="/routes/web.php?url=countries/create">Crear</a>
        </div>
        <div class="admin-menu__group">
            <div class="admin-menu__group-title"><i class="fas fa-city"></i> <span>Ciudades</span></div>
            <a class="admin-menu__subitem <?php echo is_active('cities/list'); ?>" href="/routes/web.php?url=cities/list">Listado</a>
        </div>
        <div class="admin-menu__group">
            <div class="admin-menu__group-title"><i class="fas fa-box"></i> <span>Paquetes</span></div>
            <a class="admin-menu__subitem <?php echo is_active('packages/list'); ?>" href="/routes/web.php?url=packages/list">Listado</a>
        </div>
        <div class="admin-menu__group">
            <div class="admin-menu__group-title"><i class="fas fa-route"></i> <span>Tours</span></div>
            <a class="admin-menu__subitem <?php echo is_active('tours/list'); ?>" href="/routes/web.php?url=tours/list">Listado</a>
        </div>
        <hr>
        <a class="admin-menu__item" href="/index.php"><i class="fas fa-home"></i> <span>Ir al sitio</span></a>
        <a class="admin-menu__item" href="/routes/web.php?url=logout"><i class="fas fa-right-from-bracket"></i> <span>Cerrar sesión</span></a>
    </nav>
</aside>
