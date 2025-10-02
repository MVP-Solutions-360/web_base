// Ejemplo de definición de rutas
// ...aquí se definen las rutas y controladores...

<?php
// Rutas principales del proyecto

// Autenticación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['url'] === 'login') {
	require_once __DIR__ . '/../controllers/AuthController.php';
	AuthController::login($_POST['username'], $_POST['password']);
	exit();
}
if ($_GET['url'] === 'logout') {
	require_once __DIR__ . '/../controllers/AuthController.php';
	AuthController::logout();
	exit();
}

// Panel de administración (requiere autenticación)
if ($_GET['url'] === 'admin') {
	require_once __DIR__ . '/../helpers/auth.php';
	if (!isAuthenticated()) {
		header('Location: /views/auth/login.php');
		exit();
	}
	require_once __DIR__ . '/../admin/dashboard.php';
	exit();
}

// CRUD Países
if ($_GET['url'] === 'countries/list') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::index();
	exit();
}
if ($_GET['url'] === 'countries/create') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::create();
	exit();
}
if ($_GET['url'] === 'countries/store') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::store($_POST);
	exit();
}
if ($_GET['url'] === 'countries/edit') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::edit($_GET['id']);
	exit();
}
if ($_GET['url'] === 'countries/update') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::update($_POST['id'], $_POST);
	exit();
}
if ($_GET['url'] === 'countries/delete') {
	require_once __DIR__ . '/../controllers/CountryController.php';
	CountryController::delete($_GET['id']);
	exit();
}

// CRUD Ciudades
if ($_GET['url'] === 'cities/list') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::index($_GET['country_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'cities/create') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::create($_GET['country_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'cities/store') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::store($_POST['country_id'], $_POST);
	exit();
}
if ($_GET['url'] === 'cities/edit') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::edit($_GET['id']);
	exit();
}
if ($_GET['url'] === 'cities/update') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::update($_POST['id'], $_POST);
	exit();
}
if ($_GET['url'] === 'cities/delete') {
	require_once __DIR__ . '/../controllers/CityController.php';
	CityController::delete($_GET['id']);
	exit();
}

// CRUD Paquetes
if ($_GET['url'] === 'packages/list') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::index($_GET['city_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'packages/create') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::create($_GET['city_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'packages/store') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::store($_POST['city_id'], $_POST);
	exit();
}
if ($_GET['url'] === 'packages/edit') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::edit($_GET['id']);
	exit();
}
if ($_GET['url'] === 'packages/update') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::update($_POST['id'], $_POST);
	exit();
}
if ($_GET['url'] === 'packages/delete') {
	require_once __DIR__ . '/../controllers/PackageController.php';
	PackageController::delete($_GET['id']);
	exit();
}

// CRUD Tours
if ($_GET['url'] === 'tours/list') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::index($_GET['package_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'tours/create') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::create($_GET['package_id'] ?? null);
	exit();
}
if ($_GET['url'] === 'tours/store') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::store($_POST['package_id'], $_POST);
	exit();
}
if ($_GET['url'] === 'tours/edit') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::edit($_GET['id']);
	exit();
}
if ($_GET['url'] === 'tours/update') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::update($_POST['id'], $_POST);
	exit();
}
if ($_GET['url'] === 'tours/delete') {
	require_once __DIR__ . '/../controllers/TourController.php';
	TourController::delete($_GET['id']);
	exit();
}

// Vistas públicas
if ($_GET['url'] === 'menu_destinos') {
	require_once __DIR__ . '/../views/public/menu_destinos.php';
	exit();
}
if ($_GET['url'] === 'ciudades') {
	require_once __DIR__ . '/../views/public/ciudades.php';
	exit();
}
if ($_GET['url'] === 'planes') {
	require_once __DIR__ . '/../views/public/planes.php';
	exit();
}
