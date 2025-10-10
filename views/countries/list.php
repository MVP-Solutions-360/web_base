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
    <title>Paises - Panel Admin</title>
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

            <div class="admin-header">
                <h1>Paises</h1>
                <p>Gestiona los paises registrados</p>
            </div>

            <section class="admin-card">
                <div class="admin-toolbar">
                    <h2>Listado de Paises</h2>
                    <div class="admin-toolbar__actions">
                        <a class="btn btn-primary" href="/routes/web.php?url=countries/create">
                            <i class="fas fa-plus"></i> Agregar pais
                        </a>
                        <a class="btn btn-outline" href="/routes/web.php?url=admin">
                            <i class="fas fa-arrow-left"></i> Volver al panel
                        </a>
                    </div>
                </div>

                <?php if (empty($countries)): ?>
                    <p class="muted">Aun no hay paises registrados.</p>
                <?php else: ?>
                    <div class="table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Pais</th>
                                    <th>Descripcion</th>
                                    <th style="width: 160px;">Creado</th>
                                    <th style="width: 260px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($countries as $country): ?>
                                    <tr>
                                        <td>
                                            <a href="/routes/web.php?url=countries/show&id=<?= $country['id'] ?>">
                                                <?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>
                                            </a>
                                        </td>
                                        <td><?= htmlspecialchars($country['descripcion'] ?? 'Sin descripcion') ?></td>
                                        <td><?= htmlspecialchars($country['creado_en'] ?? '') ?></td>
                                        <td class="actions">
                                            <a href="/routes/web.php?url=countries/edit&id=<?= $country['id'] ?>">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>
                                            <a href="#"
                                               class="delete-country"
                                               data-url="/routes/web.php?url=countries/delete&id=<?= $country['id'] ?>&name=<?= urlencode($country['pais'] ?? ($country['name'] ?? '')) ?>"
                                               data-name="<?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </a>
                                            <a href="/routes/web.php?url=cities/list&country_id=<?= $country['id'] ?>">
                                                <i class="fas fa-city"></i> Ver ciudades
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
                    if (status === 'created') { title = 'Pais creado'; text = name ? `Se creo "${name}" correctamente` : ''; }
                    else if (status === 'updated') { title = 'Pais actualizado'; text = name ? `Se actualizo "${name}" correctamente` : ''; }
                    else if (status === 'deleted') { title = 'Pais eliminado'; text = name ? `Se elimino "${name}" correctamente` : ''; }
                    else if (status === 'error') { title = 'Error'; text = url.searchParams.get('message') || 'Ocurrio un problema.'; icon = 'error'; }
                    if (window.Swal) {
                        Swal.fire({ icon, title, text, timer: icon === 'error' ? undefined : 2200, showConfirmButton: icon === 'error' });
                    }
                    const params = new URLSearchParams();
                    params.set('url', 'countries/list');
                    history.replaceState(null, '', `${location.pathname}?${params.toString()}`);
                }
            } catch (e) {}
        })();

        (function(){
            const links = document.querySelectorAll('.delete-country');
            links.forEach(link => {
                link.addEventListener('click', function(e){
                    e.preventDefault();
                    const url = this.getAttribute('data-url');
                    const name = this.getAttribute('data-name') || 'este pais';
                    if (!window.Swal) {
                        if (confirm(`Eliminar ${name}?`)) {
                            window.location.href = url;
                        }
                        return;
                    }
                    Swal.fire({
                        title: 'Eliminar pais?',
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
