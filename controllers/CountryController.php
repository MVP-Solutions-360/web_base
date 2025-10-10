<?php

class CountryController {
    public static function index() {
        // Cargar Paises desde la BD y pasarlos a la vista
        require_once __DIR__ . '/../config/database.php';
        $countries = [];
        $db_error = '';
        try {
            if (!isset($pdo)) {
                throw new RuntimeException('ConexiÃ³n a base de datos no inicializada ($pdo).');
            }
            $stmt = $pdo->query('SELECT id, pais, descripcion, creado_en FROM paises ORDER BY pais');
            $countries = $stmt->fetchAll();
        } catch (Throwable $e) {
            $db_error = 'Error al consultar Paises: ' . $e->getMessage();
        }
        include __DIR__ . '/../views/countries/list.php';
    }

    public static function show($id) {
        require_once __DIR__ . '/../config/database.php';
        $country = null;
        try {
            if (isset($pdo)) {
                $stmt = $pdo->prepare('SELECT id, pais, descripcion, creado_en FROM paises WHERE id = ?');
                $stmt->execute([$id]);
                $country = $stmt->fetch();
            }
        } catch (Throwable $e) {
            $country = null;
        }
        include __DIR__ . '/../views/countries/show.php';
    }

    public static function create($country_id = null) {
        // Mostrar formulario de creaciÃ³n
        include __DIR__ . '/../views/countries/create.php';
    }

    public static function store($data) {
        $errors = [];
        $nombre = isset($data['pais']) ? trim($data['pais']) : '';
        $descripcion = isset($data['descripcion']) ? trim($data['descripcion']) : '';

        // Validaciones mÃ­nimas
        if ($nombre === '') {
            $errors[] = 'El nombre del paÃ­s es obligatorio.';
        } elseif (mb_strlen($nombre) < 3) {
            $errors[] = 'El nombre del paÃ­s debe tener al menos 3 caracteres.';
        } elseif (mb_strlen($nombre) > 100) {
            $errors[] = 'El nombre del paÃ­s no puede exceder 100 caracteres.';
        }

        if ($descripcion !== '' && mb_strlen($descripcion) < 3) {
            $errors[] = 'La descripciÃ³n es muy corta.';
        }

        if (!empty($errors)) {
            // Unir mensajes y re-renderizar el formulario con error
            $error = implode('<br>', $errors);
            include __DIR__ . '/../views/countries/create.php';
            return;
        }

        // Intento de guardar (opcional, depende del esquema existente)
        try {
            require_once __DIR__ . '/../config/database.php';
            if (isset($pdo)) {
                // Inserta en la tabla real `paises`
                $stmt = $pdo->prepare('INSERT INTO paises (pais, descripcion, creado_en) VALUES (?, ?, NOW())');
                $stmt->execute([$nombre, $descripcion]);
            }
            // Redirigir al listado tras guardar con alerta
            header('Location: /routes/web.php?url=countries/list&status=created&name=' . urlencode($nombre));
            exit();
        } catch (Throwable $e) {
            // Si falla el guardado, mostrar el formulario con el error
            $error = 'No se pudo guardar el paÃ­s: ' . $e->getMessage();
            include __DIR__ . '/../views/countries/create.php';
            return;
        }
    }

    public static function edit($id) {
        require_once __DIR__ . '/../config/database.php';
        global $pdo;
        $country = null;
        try {
            if (isset($pdo)) {
                $stmt = $pdo->prepare('SELECT id, pais, descripcion, creado_en FROM paises WHERE id = ?');
                $stmt->execute([$id]);
                $country = $stmt->fetch();
            }
        } catch (Throwable $e) {
            $country = null;
        }
        include __DIR__ . '/../views/countries/edit.php';
    }

    public static function update($id, $data) {
        $errors = [];
        $nombre = isset($data['pais']) ? trim($data['pais']) : '';
        $descripcion = isset($data['descripcion']) ? trim($data['descripcion']) : '';

        if ($nombre === '') {
            $errors[] = 'El nombre del paÃ­s es obligatorio.';
        } elseif (mb_strlen($nombre) < 3) {
            $errors[] = 'El nombre del paÃ­s debe tener al menos 3 caracteres.';
        } elseif (mb_strlen($nombre) > 100) {
            $errors[] = 'El nombre del paÃ­s no puede exceder 100 caracteres.';
        }
        if ($descripcion !== '' && mb_strlen($descripcion) < 3) {
            $errors[] = 'La descripciÃ³n es muy corta.';
        }

        if (!empty($errors)) {
            $error = implode('<br>', $errors);
            // Recargar el paÃ­s para mostrar en el formulario
            require_once __DIR__ . '/../config/database.php';
            global $pdo;
            $country = null;
            if (isset($pdo)) {
                $stmt = $pdo->prepare('SELECT id, pais, descripcion, creado_en FROM paises WHERE id = ?');
                $stmt->execute([$id]);
                $country = $stmt->fetch();
            }
            include __DIR__ . '/../views/countries/edit.php';
            return;
        }

        try {
            require_once __DIR__ . '/../config/database.php';
            if (isset($pdo)) {
                $stmt = $pdo->prepare('UPDATE paises SET pais = ?, descripcion = ? WHERE id = ?');
                $stmt->execute([$nombre, $descripcion, $id]);
            }
            header('Location: /routes/web.php?url=countries/list&status=updated&name=' . urlencode($nombre));
            exit();
        } catch (Throwable $e) {
            $error = 'No se pudo actualizar el paÃ­s: ' . $e->getMessage();
            // Recargar el paÃ­s para mostrar en el formulario
            require_once __DIR__ . '/../config/database.php';
            global $pdo;
            $country = null;
            if (isset($pdo)) {
                $stmt = $pdo->prepare('SELECT id, pais, descripcion, creado_en FROM paises WHERE id = ?');
                $stmt->execute([$id]);
                $country = $stmt->fetch();
            }
            include __DIR__ . '/../views/countries/edit.php';
            return;
        }
    }

    public static function delete($id) {
        try {
            require_once __DIR__ . '/../config/database.php';
            global $pdo;
            if (isset($pdo)) {
                $nombre = '';
                try {
                    $pre = $pdo->prepare('SELECT pais FROM paises WHERE id = ?');
                    $pre->execute([$id]);
                    $row = $pre->fetch();
                    if ($row) { $nombre = $row['pais']; }
                } catch (Throwable $e) { /* ignore */ }
                $stmt = $pdo->prepare('DELETE FROM paises WHERE id = ?');
                $stmt->execute([$id]);
            }
        } catch (Throwable $e) {
            // opcional: manejar/loguear error
        }
        header('Location: /routes/web.php?url=countries/list&status=deleted&name=' . urlencode($nombre ?? ''));
        exit();
    }
}
