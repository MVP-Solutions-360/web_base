<?php
if (!isset($packages)) { $packages = []; }
if (!isset($city)) { $city = null; }
if (!isset($city_id)) { $city_id = null; }
if (!isset($db_error)) { $db_error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes - Panel Admin</title>
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
                <div class="alert">
                    <?= htmlspecialchars($db_error) ?>
                </div>
            <?php endif; ?>

            <?php
                $currentCityId = $city['id'] ?? ($city_id ?? null);
                $currentCityId = $currentCityId !== null && $currentCityId !== '' ? (int) $currentCityId : null;
                $createUrl = $currentCityId ? '/routes/web.php?url=packages/create&city_id=' . $currentCityId : '/routes/web.php?url=packages/create';
                $title = $city ? 'Paquetes de ' . ($city['ciudad'] ?? '') : 'Paquetes';
                $subtitle = $city ? 'Gestiona los paquetes de ' . ($city['ciudad'] ?? '') : 'Gestiona los paquetes registrados';
                $returnUrl = $city ? '/routes/web.php?url=cities/show&id=' . $city['id'] : '/routes/web.php?url=admin';
                $returnLabel = $city ? 'Volver a la ciudad' : 'Volver al panel';
                $cityQuery = $currentCityId ? '&city_id=' . $currentCityId : '';
            ?>

            <div class="admin-header">
                <h1><?= htmlspecialchars($title) ?></h1>
                <p><?= htmlspecialchars($subtitle) ?></p>
            </div>

            <section class="admin-card">
                <div class="admin-toolbar">
                    <h2>Listado de Paquetes</h2>
                    <div class="admin-toolbar__actions">
                        <a class="btn" href="<?= htmlspecialchars($createUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-plus"></i> Agregar paquete
                        </a>
                        <a class="btn btn-outline" href="<?= htmlspecialchars($returnUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-arrow-left"></i> <?= htmlspecialchars($returnLabel) ?>
                        </a>
                    </div>
                </div>

                <?php if (empty($packages)): ?>
                    <p class="empty">Aun no hay paquetes registrados<?= $city ? ' para esta ciudad' : '' ?>.</p>
                <?php else: ?>
                    <div class="table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Paquete</th>
                                    <?php if (!$city): ?>
                                        <th>Ciudad</th>
                                    <?php endif; ?>
                                    <th>Descripcion</th>
                                    <th style="width: 160px;">Creado</th>
                                    <th style="width: 240px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($packages as $pkg): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($pkg['nombre'] ?? ($pkg['name'] ?? '')) ?></td>
                                        <?php if (!$city): ?>
                                            <td><?= htmlspecialchars($pkg['ciudad'] ?? ($pkg['city_name'] ?? '')) ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($pkg['descripcion'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($pkg['creado_en'] ?? '') ?></td>
                                        <td class="actions">
                                            <a href="/routes/web.php?url=packages/edit&id=<?= $pkg['id'] ?><?= htmlspecialchars($cityQuery, ENT_QUOTES) ?>">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>
                                            <a href="#"
                                               class="delete-package"
                                               data-url="/routes/web.php?url=packages/delete&id=<?= $pkg['id'] ?><?= htmlspecialchars($cityQuery, ENT_QUOTES) ?>&name=<?= urlencode($pkg['nombre'] ?? ($pkg['name'] ?? '')) ?>"
                                               data-name="<?= htmlspecialchars($pkg['nombre'] ?? ($pkg['name'] ?? 'este paquete')) ?>">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </a>
                                            <a href="/routes/web.php?url=tours/list&package_id=<?= $pkg['id'] ?>">
                                                <i class="fas fa-route"></i> Ver tours
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
            if (status === 'created') { title = 'Paquete creado'; text = name ? `Se creo "${name}" correctamente` : ''; }
            else if (status === 'updated') { title = 'Paquete actualizado'; text = name ? `Se actualizo "${name}" correctamente` : ''; }
            else if (status === 'deleted') { title = 'Paquete eliminado'; text = name ? `Se elimino "${name}" correctamente` : ''; }
            else if (status === 'error') { title = 'Error'; text = url.searchParams.get('message') || 'Ocurrio un problema.'; icon = 'error'; }
            if (window.Swal) {
              Swal.fire({ icon, title, text, timer: icon === 'error' ? undefined : 2200, showConfirmButton: icon === 'error' });
            }
            const params = new URLSearchParams();
            params.set('url', 'packages/list');
            const city = url.searchParams.get('city_id');
            if (city) params.set('city_id', city);
            history.replaceState(null, '', `${location.pathname}?${params.toString()}`);
          }
        } catch {}
      })();

      (function(){
        const links = document.querySelectorAll('.delete-package');
        links.forEach(link => {
          link.addEventListener('click', function(e){
            e.preventDefault();
            const url = this.getAttribute('data-url');
            const name = this.getAttribute('data-name') || 'este paquete';
            if (!window.Swal) { if (confirm(`Eliminar ${name}?`)) location.href = url; return; }
            Swal.fire({
              title: 'Eliminar paquete?',
              text: `Esta accion eliminara "${name}"`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Si, eliminar',
              cancelButtonText: 'Cancelar'
            }).then(result => { if (result.isConfirmed) window.location.href = url; });
          });
        });
      })();
    </script>
</body>
</html>
