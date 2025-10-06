<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!function_exists('is_active')) {
    function is_active($needle)
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        return strpos($uri, $needle) !== false ? 'active' : '';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaÃ­ses - Panel Admin</title>
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .admin-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .admin-toolbar h2 {
            margin: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: var(--bg-white);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
        }

        .table th,
        .table td {
            padding: .85rem 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .table th {
            background: var(--bg-light);
            text-align: left;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .actions a {
            margin-right: .5rem;
            text-decoration: none;
            color: var(--primary-color);
            font-weight: 500
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .empty {
            padding: 1rem;
            color: var(--text-light);
        }
    </style>
</head>

<body>

    <div class="admin-layout">
        <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>

        <main class="">
            <div class="admin-toolbar">
                <h2>PaÃ­ses</h2>
                <a class="btn btn-primary" href="/routes/web.php?url=countries/create"><i class="fas fa-plus"></i> Crear paÃ­s</a>
            </div>
            <?php if (!empty($db_error)): ?>
                <div class="alert alert-danger" style="margin:1rem 0;">
                    <?= htmlspecialchars($db_error) ?>
                    <div style="color:#777;font-size:.9rem;">Verifica config/database.php y las credenciales de conexiÃ³n.</div>
                </div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th style="width:260px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($countries)): ?>
                        <tr>
                            <td colspan="2" class="empty">No hay paÃ­ses registrados.</td>
                        </tr>
                        <?php else: foreach ($countries as $country): ?>
                            <tr>
                        <td>
                            <a href="/routes/web.php?url=countries/show&id=<?= $country['id'] ?>">
                                <?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>
                            </a>
                        </td>
                                <td class="actions">
                                    <a href="/routes/web.php?url=countries/edit&id=<?= $country['id'] ?>"><i class="fas fa-pen"></i> Editar</a>
                                    <a href="#" class="delete-country" data-url="/routes/web.php?url=countries/delete&id=<?= $country['id'] ?>" data-name="<?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>"><i class="fas fa-trash"></i> Eliminar</a>
                                    <a href="/routes/web.php?url=cities/list&country_id=<?= $country['id'] ?>"><i class="fas fa-city"></i> Ver Ciudades</a>
                                </td>
                            </tr>
                    <?php endforeach;
                    endif; ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function() {
            try {
                const url = new URL(window.location.href);
                const status = url.searchParams.get('status');
                const name = url.searchParams.get('name') || '';
                if (status) {
                    let title = 'OperaciÃ³n exitosa';
                    let text = '';
                    if (status === 'created') {
                        title = 'PaÃ­s creado';
                        text = name ? `Se creÃ³ "${name}" correctamente` : '';
                    } else if (status === 'updated') {
                        title = 'PaÃ­s actualizado';
                        text = name ? `Se actualizÃ³ "${name}" correctamente` : '';
                    } else if (status === 'deleted') {
                        title = 'PaÃ­s eliminado';
                        text = name ? `Se eliminÃ³ "${name}" correctamente` : '';
                    }
                    if (window.Swal) {
                        Swal.fire({
                            icon: 'success',
                            title,
                            text,
                            timer: 2200,
                            showConfirmButton: false
                        });
                    }
                    const onlyUrl = url.searchParams.get('url') || 'countries/list';
                    const newUrl = `${location.pathname}?url=${encodeURIComponent(onlyUrl)}`;
                    history.replaceState(null, '', newUrl);
                }
            } catch (e) {
                /* ignore */
            }
        })();

        // ConfirmaciÃ³n de borrado con SweetAlert
        (function() {
            const links = document.querySelectorAll('.delete-country');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('data-url');
                    const name = this.getAttribute('data-name') || 'este paÃ­s';
                    if (!window.Swal) {
                        if (confirm(`Â¿Eliminar ${name}?`)) location.href = url;
                        return;
                    }
                    Swal.fire({
                        title: 'Â¿Eliminar paÃ­s?',
                        text: `Esta acciÃ³n eliminarÃ¡ "${name}"`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'SÃ­, eliminar',
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
    <?php include __DIR__ . "/../components/footer.php"; ?>
</body>

</html>

