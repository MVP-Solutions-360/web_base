<?php
// Rutas principales del proyecto

// Compatibilidad: permitir patrÃ³n antiguo ?controller=...&action=...
if (!isset($_GET['url'])) {
    if (isset($_GET['controller'], $_GET['action'])) {
        $c = strtolower((string)$_GET['controller']);
        $a = strtolower((string)$_GET['action']);
        $map = [
            'country' => [
                'create' => 'countries/create',
                'store'  => 'countries/store',
                'list'   => 'countries/list',
                'index'  => 'countries/list',
                'edit'   => 'countries/edit',
                'update' => 'countries/update',
                'delete' => 'countries/delete',
            ],
            'city' => [
                'create' => 'cities/create',
                'store'  => 'cities/store',
                'list'   => 'cities/list',
                'index'  => 'cities/list',
                'edit'   => 'cities/edit',
                'update' => 'cities/update',
                'delete' => 'cities/delete',
            ],
            'package' => [
                'create' => 'packages/create',
                'store'  => 'packages/store',
                'list'   => 'packages/list',
                'index'  => 'packages/list',
                'edit'   => 'packages/edit',
                'update' => 'packages/update',
                'delete' => 'packages/delete',
            ],
            'tour' => [
                'create' => 'tours/create',
                'store'  => 'tours/store',
                'list'   => 'tours/list',
                'index'  => 'tours/list',
                'edit'   => 'tours/edit',
                'update' => 'tours/update',
                'delete' => 'tours/delete',
            ],
        ];
        $_GET['url'] = $map[$c][$a] ?? '';
    } else {
        // Asegura que exista la clave para evitar warnings
        $_GET['url'] = '';
    }
}

require_once __DIR__ . '/../helpers/auth.php';

$url = $_GET['url'] ?? '';

if (
    $url === 'login'
    && $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    require_once __DIR__ . '/../controllers/AuthController.php';
    (new AuthController())->login($_POST);
    exit();
}

if ($url === 'logout') {
    require_once __DIR__ . '/../controllers/AuthController.php';
    (new AuthController())->logout();
    exit();
}

if ($url === 'admin') {
    if (!isAuthenticated()) {
        header('Location: /views/auth/login.php');
        exit();
    }
    require_once __DIR__ . '/../views/admin/admin.php';
    exit();
}
// CRUD PaÃ­ses
if (($_GET['url'] ?? '') === 'countries/list') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::index();
    exit();
}
if (($_GET['url'] ?? '') === 'countries/create') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::create();
    exit();
}
if (($_GET['url'] ?? '') === 'countries/store') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::store($_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'countries/edit') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::edit($_GET['id']);
    exit();
}
if (($_GET['url'] ?? '') === 'countries/show') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::show($_GET['id']);
    exit();
}
if (($_GET['url'] ?? '') === 'countries/update') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::update($_POST['id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'countries/delete') {
    require_once __DIR__ . '/../controllers/CountryController.php';
    CountryController::delete($_GET['id']);
    exit();
}

// CRUD Ciudades
if (($_GET['url'] ?? '') === 'cities/list') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::index($_GET['country_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'cities/create') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::create($_GET['country_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'cities/store') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::store($_POST['country_id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'cities/edit') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::edit($_GET['id']);
    exit();
}
if (($_GET['url'] ?? '') === 'cities/update') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::update($_POST['id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'cities/delete') {
    require_once __DIR__ . '/../controllers/CityController.php';
    CityController::delete($_GET['id']);
    exit();
}

// CRUD Paquetes
if (($_GET['url'] ?? '') === 'packages/list') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::index($_GET['city_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'packages/create') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::create($_GET['city_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'packages/store') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::store($_POST['city_id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'packages/edit') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::edit($_GET['id']);
    exit();
}
if (($_GET['url'] ?? '') === 'packages/update') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::update($_POST['id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'packages/delete') {
    require_once __DIR__ . '/../controllers/PackageController.php';
    PackageController::delete($_GET['id']);
    exit();
}

// CRUD Tours
if (($_GET['url'] ?? '') === 'tours/list') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::index($_GET['package_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'tours/create') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::create($_GET['package_id'] ?? null);
    exit();
}
if (($_GET['url'] ?? '') === 'tours/store') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::store($_POST['package_id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'tours/edit') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::edit($_GET['id']);
    exit();
}
if (($_GET['url'] ?? '') === 'tours/update') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::update($_POST['id'], $_POST);
    exit();
}
if (($_GET['url'] ?? '') === 'tours/delete') {
    require_once __DIR__ . '/../controllers/TourController.php';
    TourController::delete($_GET['id']);
    exit();
}

// Vistas pÃºblicas
if (($_GET['url'] ?? '') === 'menu_destinos') {
    require_once __DIR__ . '/../views/public/menu_destinos.php';
    exit();
}
if (($_GET['url'] ?? '') === 'ciudades') {
    require_once __DIR__ . '/../views/public/ciudades.php';
    exit();
}
if (($_GET['url'] ?? '') === 'planes') {
    require_once __DIR__ . '/../views/public/planes.php';
    exit();
}
