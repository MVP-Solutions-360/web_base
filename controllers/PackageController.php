<?php
class PackageController {
    public static function index($city_id) {
        // ...listar paquetes de una ciudad...
    }
    public static function create($city_id) {
        // ...mostrar formulario de creación...
    }
    public static function store($city_id, $data) {
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=packages/list';
        if ($city_id) { $qs .= '&city_id=' . urlencode($city_id); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=created');
        exit();
    }
    public static function edit($id) {
        // ...mostrar formulario de edición...
    }
    public static function update($id, $data) {
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=packages/list';
        if (isset($data['city_id']) && $data['city_id'] !== '') { $qs .= '&city_id=' . urlencode($data['city_id']); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=updated');
        exit();
    }
    public static function delete($id) {
        $qs = 'url=packages/list';
        if (isset($_GET['city_id']) && $_GET['city_id'] !== '') { $qs .= '&city_id=' . urlencode($_GET['city_id']); }
        if (isset($_GET['name']) && $_GET['name'] !== '') { $qs .= '&name=' . urlencode($_GET['name']); }
        header('Location: /routes/web.php?' . $qs . '&status=deleted');
        exit();
    }
}
