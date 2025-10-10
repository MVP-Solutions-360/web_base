<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($country)) {
    $country = null;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudades - Panel Admin</title>
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/admin_panel.css">
    <link rel="stylesheet" href="/assets/css/admin-table.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <div class="admin-wrapper">
        <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>

        <main class="admin-content">
            <?php if (!empty($db_error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($db_error) ?>
                </div>
            <?php endif; ?>

            <?php
                $currentCountryId = null;
                if (isset($country) && is_array($country) && isset($country['id'])) {
                    $currentCountryId = (int) $country['id'];
                } elseif (isset($country_id) && $country_id !== null && $country_id !== '') {
                    $currentCountryId = (int) $country_id;
                }

                if ($currentCountryId !== null && (!isset($country) || !is_array($country) || !isset($country['id']))) {
                    $country = null;
                    if (!empty($cities)) {
                        foreach ($cities as $cityContext) {
                            if (isset($cityContext['pais_id'], $cityContext['pais']) && (int) $cityContext['pais_id'] === $currentCountryId) {
                                $country = [
                                    'id'   => (int) $cityContext['pais_id'],
                                    'pais' => $cityContext['pais'],
                                ];
                                break;
                            }
                        }
                    }
                }

                $hasCountryContext = isset($country) && is_array($country) && isset($country['id']);
                $contextQuery = $hasCountryContext ? ['country_id' => (int) $country['id']] : [];

                $createUrl = '/routes/web.php?' . http_build_query(array_merge(['url' => 'cities/create'], $contextQuery));
                $title = $hasCountryContext ? 'Ciudades de ' . ($country['pais'] ?? '') : 'Ciudades por Pais';
                $subtitle = $hasCountryContext ? 'Gestiona los destinos registrados en ' . ($country['pais'] ?? '') : 'Gestiona los destinos registrados en todos los paises';
                $returnUrl = $hasCountryContext
                    ? '/routes/web.php?' . http_build_query(['url' => 'countries/show', 'id' => (int) $country['id']])
                    : '/routes/web.php?url=countries/list';
                $returnLabel = $hasCountryContext ? 'Volver al pais' : 'Volver a paises';
            ?>

            <div class="admin-header">
                <h1><?= htmlspecialchars($title) ?></h1>
                <p><?= htmlspecialchars($subtitle) ?></p>
            </div>

            <section class="admin-card">
                <div class="admin-toolbar">
                    <h2>Listado de Ciudades</h2>
                    <div class="admin-toolbar__actions">
                        <a class="btn btn-primary" href="<?= htmlspecialchars($createUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-plus"></i> Agregar ciudad
                        </a>
                        <a class="btn btn-outline" href="<?= htmlspecialchars($returnUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-arrow-left"></i> <?= htmlspecialchars($returnLabel) ?>
                        </a>
                    </div>
                </div>

                <?php if (empty($cities)): ?>
                    <p class="muted">Aun no hay ciudades registradas<?= $country ? ' para este pais' : '' ?>.</p>
                <?php else: ?>
                    <div class="table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Ciudad</th>
                                    <?php if (!$hasCountryContext): ?>
                                        <th>Pais</th>
                                    <?php endif; ?>
                                    <th>Descripcion</th>
                                    <th style="width: 160px;">Creado</th>
                                    <th style="width: 200px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cities as $city): ?>
                                    <?php
                                        $editUrl = '/routes/web.php?' . http_build_query(array_merge(
                                            ['url' => 'cities/edit', 'id' => (int) $city['id']],
                                            $contextQuery
                                        ));
                                        $deleteParams = array_merge(
                                            ['url' => 'cities/delete', 'id' => (int) $city['id'], 'name' => $city['ciudad']],
                                            $contextQuery
                                        );
                                        $deleteUrl = '/routes/web.php?' . http_build_query($deleteParams);
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($city['ciudad']) ?></td>
                                        <?php if (!$hasCountryContext): ?>
                                            <td><?= htmlspecialchars($city['pais'] ?? '') ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($city['descripcion'] ?? 'Sin descripcion') ?></td>
                                        <td><?= htmlspecialchars($city['creado_en'] ?? '') ?></td>
                                        <td class="actions">
                                            <a href="<?= htmlspecialchars($editUrl, ENT_QUOTES) ?>">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#"
                                               class="delete-city"
                                               data-url="<?= htmlspecialchars($deleteUrl, ENT_QUOTES) ?>"
                                               data-name="<?= htmlspecialchars($city['ciudad']) ?>">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            try {
                const url = new URL(window.location.href);
                const status = url.searchParams.get('status');
                const name = url.searchParams.get('name') || '';
                if (status) {
                    let title = 'Operacion exitosa';
                    let text = '';
                    let icon = 'success';
                    if (status === 'created') { title = 'Ciudad creada'; text = name ? `Se creo "${name}" correctamente` : ''; }
                    else if (status === 'updated') { title = 'Ciudad actualizada'; text = name ? `Se actualizo "${name}" correctamente` : ''; }
                    else if (status === 'deleted') { title = 'Ciudad eliminada'; text = name ? `Se elimino "${name}" correctamente` : ''; }
                    else if (status === 'error') { title = 'Error'; text = url.searchParams.get('message') || 'Ocurrio un problema.'; icon = 'error'; }
                    if (window.Swal) {
                        Swal.fire({ icon, title, text, timer: icon === 'error' ? undefined : 2200, showConfirmButton: icon === 'error' });
                    }
                    const params = new URLSearchParams();
                    params.set('url', 'cities/list');
                    const country = url.searchParams.get('country_id');
                    if (country) {
                        params.set('country_id', country);
                    }
                    history.replaceState(null, '', `${location.pathname}?${params.toString()}`);
                }
            } catch (e) {}
        })();

        (function(){
            const links = document.querySelectorAll('.delete-city');
            links.forEach(link => {
                link.addEventListener('click', function(e){
                    e.preventDefault();
                    const url = this.getAttribute('data-url');
                    const name = this.getAttribute('data-name') || 'esta ciudad';
                    if (!window.Swal) {
                        if (confirm(`Eliminar ${name}?`)) {
                            window.location.href = url;
                        }
                        return;
                    }
                    Swal.fire({
                        title: 'Eliminar ciudad?',
                        text: `Esta accion eliminara "${name}"`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Si, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then(result => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        })();
    </script>
</body>
</html>
