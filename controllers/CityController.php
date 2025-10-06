<?php

class CityController
{
    public static function index($country_id)
    {
        require_once __DIR__ . '/../config/database.php';

        $cities = [];
        $country = null;
        $db_error = '';
        $currentCountryId = null;

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            if ($country_id !== null && $country_id !== '') {
                $currentCountryId = (int) $country_id;
                $stmt = $pdo->prepare('SELECT id, pais FROM paises WHERE id = ?');
                $stmt->execute([$currentCountryId]);
                $country = $stmt->fetch();
                if (!$country) {
                    $currentCountryId = null;
                }
            }

            if ($currentCountryId !== null) {
                $cityStmt = $pdo->prepare('SELECT id, pais_id, ciudad, descripcion, creado_en FROM destinos WHERE pais_id = ? ORDER BY ciudad');
                $cityStmt->execute([$currentCountryId]);
                $cities = $cityStmt->fetchAll() ?: [];
            } else {
                $cityStmt = $pdo->query('SELECT d.id, d.pais_id, d.ciudad, d.descripcion, d.creado_en, p.pais AS pais FROM destinos d LEFT JOIN paises p ON p.id = d.pais_id ORDER BY p.pais, d.ciudad');
                $cities = $cityStmt ? ($cityStmt->fetchAll() ?: []) : [];
            }
        } catch (Throwable $e) {
            $db_error = 'Error al consultar ciudades: ' . $e->getMessage();
        }

        $country_id = $currentCountryId;
        include __DIR__ . '/../views/cities/list.php';
    }

    public static function create($country_id = null)
    {
        require_once __DIR__ . '/../config/database.php';

        $db_error = '';
        $error = '';
        $countries = [];
        $formData = ['ciudad' => '', 'descripcion' => ''];
        $selectedCountryId = ($country_id !== null && $country_id !== '') ? (int) $country_id : null;

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            $countries = self::fetchCountries($pdo);
            if ($selectedCountryId !== null && !self::countryExists($countries, $selectedCountryId)) {
                $selectedCountryId = null;
            }
        } catch (Throwable $e) {
            $db_error = 'Error al preparar formulario: ' . $e->getMessage();
        }

        include __DIR__ . '/../views/cities/create.php';
    }

    public static function store($country_id, $data)
    {
        require_once __DIR__ . '/../config/database.php';

        $countries = [];
        $selectedCountryId = ($country_id !== null && $country_id !== '') ? (int) $country_id : null;
        $cityName = trim($data['ciudad'] ?? $data['name'] ?? '');
        $descripcion = trim($data['descripcion'] ?? '');
        $error = '';
        $formData = [
            'ciudad' => $cityName,
            'descripcion' => $descripcion,
        ];

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            $countries = self::fetchCountries($pdo);
            if ($selectedCountryId === null && isset($data['country_id']) && $data['country_id'] !== '') {
                $selectedCountryId = (int) $data['country_id'];
            }
            if ($selectedCountryId !== null && !self::countryExists($countries, $selectedCountryId)) {
                $selectedCountryId = null;
            }

            $error = self::validateCity($cityName, $descripcion, $selectedCountryId);

            if ($error === '') {
                $stmt = $pdo->prepare('INSERT INTO destinos (pais_id, ciudad, descripcion, creado_en) VALUES (?, ?, ?, NOW())');
                $stmt->execute([$selectedCountryId, $cityName, $descripcion !== '' ? $descripcion : null]);

                $qs = 'url=cities/list&status=created&name=' . urlencode($cityName);
                if ($selectedCountryId !== null) {
                    $qs .= '&country_id=' . $selectedCountryId;
                }
                header('Location: /routes/web.php?' . $qs);
                exit();
            }
        } catch (PDOException $e) {
            if ((int) $e->getCode() === 23000) {
                $error = 'Ya existe una ciudad con ese nombre para el pais seleccionado.';
            } else {
                $error = 'No se pudo guardar la ciudad: ' . $e->getMessage();
            }
        } catch (Throwable $e) {
            $error = 'No se pudo guardar la ciudad: ' . $e->getMessage();
        }

        include __DIR__ . '/../views/cities/create.php';
    }

    public static function edit($id)
    {
        require_once __DIR__ . '/../config/database.php';

        $city = null;
        $countries = [];
        $error = '';
        $db_error = '';

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            $stmt = $pdo->prepare('SELECT d.id, d.pais_id, d.ciudad, d.descripcion, d.creado_en, p.pais FROM destinos d LEFT JOIN paises p ON p.id = d.pais_id WHERE d.id = ?');
            $stmt->execute([$id]);
            $city = $stmt->fetch();

            if (!$city) {
                $error = 'Ciudad no encontrada.';
            }

            $countries = self::fetchCountries($pdo);
        } catch (Throwable $e) {
            $db_error = 'Error al cargar la ciudad: ' . $e->getMessage();
        }

        include __DIR__ . '/../views/cities/edit.php';
    }

    public static function update($id, $data)
    {
        require_once __DIR__ . '/../config/database.php';

        $countries = [];
        $city = null;
        $error = '';
        $db_error = '';

        $cityName = trim($data['ciudad'] ?? $data['name'] ?? '');
        $descripcion = trim($data['descripcion'] ?? '');
        $selectedCountryId = isset($data['country_id']) ? (int) $data['country_id'] : null;

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            $countries = self::fetchCountries($pdo);
            if ($selectedCountryId !== null && !self::countryExists($countries, $selectedCountryId)) {
                $selectedCountryId = null;
            }

            $error = self::validateCity($cityName, $descripcion, $selectedCountryId);

            if ($error === '') {
                $stmt = $pdo->prepare('UPDATE destinos SET pais_id = ?, ciudad = ?, descripcion = ? WHERE id = ?');
                $stmt->execute([$selectedCountryId, $cityName, $descripcion !== '' ? $descripcion : null, $id]);

                $qs = 'url=cities/list&status=updated&name=' . urlencode($cityName);
                if ($selectedCountryId !== null) {
                    $qs .= '&country_id=' . $selectedCountryId;
                }
                header('Location: /routes/web.php?' . $qs);
                exit();
            }

            $stmt = $pdo->prepare('SELECT d.id, d.pais_id, d.ciudad, d.descripcion, d.creado_en, p.pais FROM destinos d LEFT JOIN paises p ON p.id = d.pais_id WHERE d.id = ?');
            $stmt->execute([$id]);
            $city = $stmt->fetch();
        } catch (PDOException $e) {
            if ((int) $e->getCode() === 23000) {
                $error = 'Ya existe una ciudad con ese nombre para el pais seleccionado.';
            } else {
                $error = 'No se pudo actualizar la ciudad: ' . $e->getMessage();
            }
            $stmt = $pdo->prepare('SELECT d.id, d.pais_id, d.ciudad, d.descripcion, d.creado_en, p.pais FROM destinos d LEFT JOIN paises p ON p.id = d.pais_id WHERE d.id = ?');
            $stmt->execute([$id]);
            $city = $stmt->fetch();
        } catch (Throwable $e) {
            $db_error = 'No se pudo actualizar la ciudad: ' . $e->getMessage();
            $stmt = $pdo->prepare('SELECT d.id, d.pais_id, d.ciudad, d.descripcion, d.creado_en, p.pais FROM destinos d LEFT JOIN paises p ON p.id = d.pais_id WHERE d.id = ?');
            $stmt->execute([$id]);
            $city = $stmt->fetch();
        }

        include __DIR__ . '/../views/cities/edit.php';
    }

    public static function delete($id)
    {
        require_once __DIR__ . '/../config/database.php';

        $countryId = null;
        $name = '';

        try {
            if (!isset($pdo)) {
                throw new RuntimeException('Conexion a base de datos no inicializada ($pdo).');
            }

            $stmt = $pdo->prepare('SELECT pais_id, ciudad FROM destinos WHERE id = ?');
            $stmt->execute([$id]);
            if ($row = $stmt->fetch()) {
                $countryId = (int) $row['pais_id'];
                $name = $row['ciudad'];
            }

            $deleteStmt = $pdo->prepare('DELETE FROM destinos WHERE id = ?');
            $deleteStmt->execute([$id]);
        } catch (Throwable $e) {
            $qs = 'url=cities/list&status=error&message=' . urlencode('No se pudo eliminar la ciudad: ' . $e->getMessage());
            if ($countryId !== null) {
                $qs .= '&country_id=' . $countryId;
            }
            header('Location: /routes/web.php?' . $qs);
            exit();
        }

        $qs = 'url=cities/list&status=deleted';
        if ($name !== '') {
            $qs .= '&name=' . urlencode($name);
        }
        if ($countryId !== null) {
            $qs .= '&country_id=' . $countryId;
        }
        header('Location: /routes/web.php?' . $qs);
        exit();
    }

    private static function fetchCountries($pdo)
    {
        $stmt = $pdo->query('SELECT id, pais FROM paises ORDER BY pais');
        return $stmt ? ($stmt->fetchAll() ?: []) : [];
    }

    private static function countryExists(array $countries, $countryId)
    {
        foreach ($countries as $country) {
            if ((int) $country['id'] === (int) $countryId) {
                return true;
            }
        }
        return false;
    }

    private static function validateCity($name, $description, $countryId)
    {
        $errors = [];

        if ($countryId === null) {
            $errors[] = 'Debes seleccionar un pais valido.';
        }

        if ($name === '') {
            $errors[] = 'El nombre de la ciudad es obligatorio.';
        } elseif (mb_strlen($name) < 3) {
            $errors[] = 'El nombre de la ciudad debe tener al menos 3 caracteres.';
        } elseif (mb_strlen($name) > 100) {
            $errors[] = 'El nombre de la ciudad no puede exceder 100 caracteres.';
        }

        if ($description !== '' && mb_strlen($description) < 3) {
            $errors[] = 'La descripcion es muy corta.';
        }

        return implode('<br>', $errors);
    }
}
