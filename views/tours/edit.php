<?php
if (!isset($tour)) { $tour = null; }
if (!isset($packages)) { $packages = []; }
if (!isset($error)) { $error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tour - Panel Admin</title>
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
            <div class="admin-header">
                <h1>Editar Tour</h1>
                <p>Actualiza la informacion del tour</p>
            </div>

            <section class="admin-card form-container">
                <?php if (empty($tour)): ?>
                    <p class="empty">Tour no encontrado.</p>
                    <a class="btn btn-outline" href="/routes/web.php?url=tours/list"><i class="fas fa-arrow-left"></i> Volver al listado</a>
                <?php else: ?>
                    <form id="tourEditForm" method="POST" action="/routes/web.php?url=tours/update" class="admin-form" novalidate>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($tour['id'] ?? '') ?>">

                        <?php if (!empty($error)): ?>
                            <div class="alert"><?= $error ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="name">Nombre del tour</label>
                            <input id="name" type="text" name="name" required minlength="3" maxlength="120" value="<?= htmlspecialchars($tour['nombre'] ?? ($tour['name'] ?? '')) ?>">
                        </div>

                        <div class="form-group">
                            <label for="packageSelect">Paquete</label>
                            <select id="packageSelect" name="package_id" required>
                                <option value="">Selecciona un paquete</option>
                                <?php foreach ($packages as $p): ?>
                                    <option value="<?= (int) $p['id'] ?>" <?= (int)($tour['package_id'] ?? 0) === (int)$p['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($p['nombre'] ?? ($p['name'] ?? '')) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-actions">
                            <button class="btn" type="submit"><i class="fas fa-save"></i> Actualizar tour</button>
                            <a class="btn btn-outline" href="/routes/web.php?url=tours/list">Cancelar</a>
                        </div>
                    </form>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            const form = document.getElementById('tourEditForm');
            if (!form) return;
            form.addEventListener('submit', function(e){
                const name = form.name.value.trim();
                const pkg = form.package_id.value;
                const errors = [];
                if (name.length < 3) errors.push('El nombre del tour debe tener al menos 3 caracteres');
                if (name.length > 120) errors.push('El nombre del tour no puede exceder 120 caracteres');
                if (!pkg) errors.push('Debes seleccionar un paquete');
                if (errors.length) {
                    e.preventDefault();
                    if (window.Swal) {
                        Swal.fire({ icon: 'error', title: 'Revisa la informacion', html: errors.join('<br>') });
                    } else {
                        alert(errors.join('\n'));
                    }
                }
            });
        })();
    </script>
</body>
</html>
