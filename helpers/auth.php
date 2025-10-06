<?php
if (!function_exists('isAuthenticated')) {
    function isAuthenticated(): bool {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION['active']) && $_SESSION['active'] === true;
    }
}

if (!function_exists('requireAuth')) {
    function requireAuth(): void {
        if (!isAuthenticated()) {
            header('Location: /views/auth/login.php');
            exit();
        }
    }
}
