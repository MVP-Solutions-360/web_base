<?php
// Esta vista solo muestra el formulario y los errores
// La lógica de autenticación está en AuthController
if (!isset($error)) {
    $error = '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilrop Colombia Travel - Turismo República Dominicana y Antioquia</title>
    <meta name="description" content="Wilrop Colombia Travel - Agencia especializada en turismo entre República Dominicana y Antioquia, Colombia. Descubre destinos únicos con nosotros.">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <!-- Login Section -->
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-content">
                    <div class="login-header">
                        <h2>Iniciar Sesión</h2>
                        <p>Accede a tu cuenta para gestionar tus reservas y disfrutar de servicios exclusivos</p>
                    </div>
                    
                    <form id="loginForm" class="login-form" method="POST" action="/routes/web.php?url=login">
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="email">Correo Electr�nico</label>
                            <div class="input-group">
                                <i class="fas fa-envelope"></i>
                                <input type="email" id="email" name="username" required placeholder="tu@email.com" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-group">
                                <i class="fas fa-lock"></i>
                                <input type="password" id="password" name="password" required placeholder="Tu contraseña">
                                <button type="button" class="password-toggle" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="passwordToggleIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-options">
                            <label class="checkbox-container">
                                <input type="checkbox" id="rememberMe" name="rememberMe">
                                <span class="checkmark"></span>
                                Recordarme
                            </label>
                            <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                        </div>
                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-sign-in-alt"></i>
                            Iniciar Sesión
                        </button>
                        <div class="login-divider">
                            <span>o</span>
                        </div>
                        <div class="social-login">
                            <button type="button" class="btn btn-social btn-google">
                                <i class="fab fa-google"></i>
                                Continuar con Google
                            </button>
                            <button type="button" class="btn btn-social btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                                Continuar con Facebook
                            </button>
                        </div>
                    </form>
                    
                    <div class="login-footer">
                        <p>¿No tienes una cuenta? <a href="/views/auth/register.php" class="register-link">Regístrate aquí</a></p>
                    </div>
                </div>
                
                <div class="login-image">
                    <div class="login-bg">
                        <div class="login-overlay"></div>
                        <div class="login-text">
                            <h3>¡Bienvenido de vuelta!</h3>
                            <p>Accede a tu cuenta y descubre nuevas aventuras con Wilrop Colombia Travel</p>
                            <div class="login-features">
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Gestiona tus reservas</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Acceso a ofertas exclusivas</span>
                                </div>
                                <div class="feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Historial de viajes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include __DIR__ . "/../components/footer.php"; ?>

    <script src="/assets/js/scripts.js"></script>
</body>
</html>
