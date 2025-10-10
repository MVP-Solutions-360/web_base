<?php
if (!isset($tours)) { $tours = []; }
if (!isset($package)) { $package = null; }
if (!isset($package_id)) { $package_id = null; }
if (!isset($db_error)) { $db_error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tours - Panel Admin</title>
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
                $currentPackageId = $package['id'] ?? ($package_id ?? null);
                $currentPackageId = $currentPackageId !== null && $currentPackageId !== '' ? (int) $currentPackageId : null;
                $createUrl = $currentPackageId ? '/routes/web.php?url=tours/create&package_id=' . $currentPackageId : '/routes/web.php?url=tours/create';
                $title = $package ? 'Tours de ' . ($package['nombre'] ?? ($package['name'] ?? '')) : 'Tours';
                $subtitle = $package ? 'Gestiona los tours del paquete seleccionado' : 'Gestiona los tours registrados';
                $returnUrl = $package ? '/routes/web.php?url=packages/show&id=' . $package['id'] : '/routes/web.php?url=admin';
                $returnLabel = $package ? 'Volver al paquete' : 'Volver al panel';
                $pkgQuery = $currentPackageId ? '&package_id=' . $currentPackageId : '';
            ?>

            <div class="admin-header">
                <h1><?= htmlspecialchars($title) ?></h1>
                <p><?= htmlspecialchars($subtitle) ?></p>
            </div>

            <section class="admin-card">
                <div class="admin-toolbar">
                    <h2>Listado de Tours</h2>
                    <div class="admin-toolbar__actions">
                        <a class="btn" href="<?= htmlspecialchars($createUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-plus"></i> Agregar tour
                        </a>
                        <a class="btn btn-outline" href="<?= htmlspecialchars($returnUrl, ENT_QUOTES) ?>">
                            <i class="fas fa-arrow-left"></i> <?= htmlspecialchars($returnLabel) ?>
                        </a>
                    </div>
                </div>

                <?php if (empty($tours)): ?>
                    <p class="empty">Aun no hay tours registrados<?= $package ? ' para este paquete' : '' ?>.</p>
                <?php else: ?>
                    <div class="table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Tour</th>
                                    <?php if (!$package): ?>
                                        <th>Paquete</th>
                                    <?php endif; ?>
                                    <th>Descripcion</th>
                                    <th style="width: 160px;">Creado</th>
                                    <th style="width: 240px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tours as $tour): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($tour['nombre'] ?? ($tour['name'] ?? '')) ?></td>
                                        <?php if (!$package): ?>
                                            <td><?= htmlspecialchars($tour['paquete'] ?? ($tour['package_name'] ?? '')) ?></td>
                                        <?php endif; ?>
                                        <td><?= htmlspecialchars($tour['descripcion'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($tour['creado_en'] ?? '') ?></td>
                                        <td class="actions">
                                            <a href="/routes/web.php?url=tours/edit&id=<?= $tour['id'] ?><?= htmlspecialchars($pkgQuery, ENT_QUOTES) ?>">
                                                <i class="fas fa-pen"></i> Editar
                                            </a>
                                            <a href="#" class="delete-tour" data-url="/routes/web.php?url=tours/delete&id=<?= $tour['id'] ?><?= htmlspecialchars($pkgQuery, ENT_QUOTES) ?>&name=<?= urlencode($tour['nombre'] ?? ($tour['name'] ?? '')) ?>" data-name="<?= htmlspecialchars($tour['nombre'] ?? ($tour['name'] ?? 'este tour')) ?>">
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
            if (status === 'created') { title = 'Tour creado'; text = name ? `Se creo "${name}" correctamente` : ''; }
            else if (status === 'updated') { title = 'Tour actualizado'; text = name ? `Se actualizo "${name}" correctamente` : ''; }
            else if (status === 'deleted') { title = 'Tour eliminado'; text = name ? `Se elimino "${name}" correctamente` : ''; }
            else if (status === 'error') { title = 'Error'; text = url.searchParams.get('message') || 'Ocurrio un problema.'; icon = 'error'; }
            if (window.Swal) {
              Swal.fire({ icon, title, text, timer: icon === 'error' ? undefined : 2200, showConfirmButton: icon === 'error' });
            }
            const params = new URLSearchParams();
            params.set('url', 'tours/list');
            const pkg = url.searchParams.get('package_id');
            if (pkg) params.set('package_id', pkg);
            history.replaceState(null, '', `${location.pathname}?${params.toString()}`);
          }
        } catch {}
      })();

      (function(){
        const links = document.querySelectorAll('.delete-tour');
        links.forEach(link => {
          link.addEventListener('click', function(e){
            e.preventDefault();
            const url = this.getAttribute('data-url');
            const name = this.getAttribute('data-name') || 'este tour';
            if (!window.Swal) { if (confirm(`Eliminar ${name}?`)) location.href = url; return; }
            Swal.fire({
              title: 'Eliminar tour?',
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
