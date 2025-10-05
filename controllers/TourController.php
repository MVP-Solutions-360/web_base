<?php
class TourController {
    public static function index($package_id) {
        // ...listar tours de un paquete...
    }
    public static function create($package_id) {
        // ...mostrar formulario de creación...
    }
    public static function store($package_id, $data) {
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=tours/list';
        if ($package_id) { $qs .= '&package_id=' . urlencode($package_id); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=created');
        exit();
    }
    public static function edit($id) {
        // ...mostrar formulario de edición...
    }
    public static function update($id, $data) {
        $name = isset($data['name']) ? trim($data['name']) : '';
        $qs = 'url=tours/list';
        if (isset($data['package_id']) && $data['package_id'] !== '') { $qs .= '&package_id=' . urlencode($data['package_id']); }
        if ($name !== '') { $qs .= '&name=' . urlencode($name); }
        header('Location: /routes/web.php?' . $qs . '&status=updated');
        exit();
    }
    public static function delete($id) {
        $qs = 'url=tours/list';
        if (isset($_GET['package_id']) && $_GET['package_id'] !== '') { $qs .= '&package_id=' . urlencode($_GET['package_id']); }
        if (isset($_GET['name']) && $_GET['name'] !== '') { $qs .= '&name=' . urlencode($_GET['name']); }
        header('Location: /routes/web.php?' . $qs . '&status=deleted');
        exit();
    }
}
