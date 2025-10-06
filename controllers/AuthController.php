<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function login(array $data): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        global $pdo;

        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');
        $error = '';

        if ($username === '' || $password === '') {
            $error = 'Por favor completa todos los campos';
            include __DIR__ . '/../views/auth/login.php';
            return;
        }

        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && (password_verify($password, $user['password']) || md5($password) === $user['password'])) {
            $_SESSION['active'] = true;
            $_SESSION['idUser'] = $user['id'];
            $_SESSION['nombre'] = trim(($user['nombre'] ?? '') . ' ' . ($user['apellido'] ?? '')) ?: $user['email'];
            $_SESSION['correo'] = $user['email'];
            $_SESSION['usuario'] = $user['email'];

            header('Location: /views/admin/admin.php');
            exit();
        }

        $error = 'Credenciales invalidas';
        include __DIR__ . '/../views/auth/login.php';
    }

    public function logout(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $_SESSION = [];
        session_destroy();

        header('Location: /views/auth/login.php');
        exit();
    }
}
