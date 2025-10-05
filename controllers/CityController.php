<?php
class CityController {
    public static function index($country_id) {
        // ...listar ciudades de un país...
    }
    public static function create($country_id) {
        // ...mostrar formulario de creación...
    }
    public static function store($country_id, $data) {
        // Redirección con estado tras guardar
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=cities/list';
        if ($country_id) { $qs .= '&country_id=' . urlencode($country_id); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=created');
        exit();
    }
    public static function edit($id) {
        // ...mostrar formulario de edición...
    }
    public static function update($id, $data) {
        // Redirección con estado tras actualizar
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=cities/list';
        if (isset($data['country_id']) && $data['country_id'] !== '') { $qs .= '&country_id=' . urlencode($data['country_id']); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=updated');
        exit();
    }
    public static function delete($id) {
        // Redirección con estado tras eliminar
        $qs = 'url=cities/list';
        if (isset($_GET['country_id']) && $_GET['country_id'] !== '') { $qs .= '&country_id=' . urlencode($_GET['country_id']); }
        if (isset($_GET['name']) && $_GET['name'] !== '') { $qs .= '&name=' . urlencode($_GET['name']); }
        header('Location: /routes/web.php?' . $qs . '&status=deleted');
        exit();
    }
}

