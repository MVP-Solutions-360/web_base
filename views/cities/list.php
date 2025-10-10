<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
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
                $currentCountryId = $country['id'] ?? ($country_id ?? null);
                $currentCountryId = $currentCountryId !== null && $currentCountryId !== '' ? (int) $currentCountryId : null;
                $createUrl = $currentCountryId ? '/routes/web.php?url=cities/create&country_id=' . $currentCountryId : '/routes/web.php?url=cities/create';
                $title = $country ? 'Ciudades de ' . ($country['pais'] ?? '') : 'Ciudades por Pais';
                $subtitle = $country ? 'Gestiona los destinos registrados en ' . ($country['pais'] ?? '') : 'Gestiona los destinos registrados en todos los paises';
                $returnUrl = $country ? '/routes/web.php?url=countries/show&id=' . $country['id'] : '/routes/web.php?url=countries/list';
                $returnLabel = $country ? 'Volver al pais' : 'Volver a paises';
                $countryQuery = $currentCountryId ? '&country_id=' . $currentCountryId : '';
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
                                    <?php if (!$country): ?>
                                        <th>Pais</th>
                                    <?php endif; ?>
                                    <th>Descripcion</th>
                                    <th style="width: 160px;">Creado</th>
                                    <th style="width: 200px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cities as $city): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($city['ciudad']) ?></td>
                                        <?php if (!$country): ?>
                                            <td><?= htmlspecialchars($city['pais'] ?? '') ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($city['descripcion'] ?? 'Sin descripcion') ?></td>
                                        <td><?= htmlspecialchars($city['creado_en'] ?? '') ?></td>
                                        <td class="actions">
                                            <a href="/routes/web.php?url=cities/edit&id=<?= $city['id'] ?><?= htmlspecialchars($countryQuery, ENT_QUOTES) ?>">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>
                                            <a href="#"
                                               class="delete-city"
                                               data-url="/routes/web.php?url=cities/delete&id=<?= $city['id'] ?><?= htmlspecialchars($countryQuery, ENT_QUOTES) ?>&name=<?= urlencode($city['ciudad']) ?>"
                                               data-name="<?= htmlspecialchars($city['ciudad']) ?>">
                                                <i class="fas fa-trash"></i> Eliminar
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
