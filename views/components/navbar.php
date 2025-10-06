<header class="header">
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <div class="logo-container">
                    <a href="/index.php" class="logo-link">
                        <img src="/public/imagenes/logos/wilrop_vertical.png" alt="Wilrop Colombia Travel" class="logo-image">
                    </a>
                </div>
            </div>
            <ul class="nav-menu">

                <li><a href="/views/countries/dominicana.php" class="nav-link">República Dominicana</a></li>
                <li><a href="/views/countries/colombia.php" class="nav-link">Colombia</a></li>
                <li><a href="/index.php#contacto" class="nav-link">Contacto</a></li>
                <?php
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                if (!empty($_SESSION['active'])):
                ?>
                    <li><a href="/routes/web.php?url=admin" class="nav-link">Admin</a></li>
                    <li class="nav-user"><span class="nav-link">Hola, <?php echo htmlspecialchars($_SESSION['nombre'] ?? 'Usuario'); ?></span></li>
                    <li>
                        <a href="/routes/web.php?url=logout" class="nav-link login-btn">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/views/auth/login.php" class="nav-link login-btn active">Iniciar Sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>
    <div class="mobile-menu-overlay"></div>
</header>