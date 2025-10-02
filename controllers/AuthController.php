<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public static function login($username, $password) {
        session_start();
        global $pdo;
        $error = '';
        if (!empty($username) && !empty($password)) {
            $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ?');
            $stmt->execute([$username]);
            $user = $stmt->fetch();
            if ($user) {
                if (password_verify($password, $user['password']) || md5($password) === $user['password']) {
                    $_SESSION['active'] = true;
                    $_SESSION['idUser'] = $user['id'];
                    $_SESSION['nombre'] = $user['nombre'] . ' ' . $user['apellido'];
                    $_SESSION['correo'] = $user['email'];
                    $_SESSION['usuario'] = $user['email'];
                    if ($user['id'] == 1) {
                        header('Location: /admin');
                    } else {
                        header('Location: /index.php');
                    }
                    exit();
                } else {
                    $error = 'Contraseña incorrecta';
                }
            } else {
                $error = 'Usuario no encontrado';
            }
        } else {
            $error = 'Por favor completa todos los campos';
        }
        // Mostrar el formulario de login con error
        include __DIR__ . '/../views/auth/login.php';
    }

    public static function logout() {
        session_start();
        session_destroy();
        header('Location: /index.php');
        exit();
    }

    public static function check() {
        session_start();
        return isset($_SESSION['active']) && $_SESSION['active'] === true;
    }
}
