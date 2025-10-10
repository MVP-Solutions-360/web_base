<?php
if (!isset($cities)) { $cities = []; }
if (!isset($selectedCityId)) { $selectedCityId = null; }
if (!isset($error)) { $error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Paquete - Panel Admin</title>
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
                <h1>Agregar Paquete</h1>
                <p>Registra un nuevo paquete</p>
            </div>

            <section class="admin-card form-container">
                <form id="packageCreateForm" method="POST" action="/routes/web.php?url=packages/store" class="admin-form" novalidate>
                    <?php if (!empty($error)): ?>
                        <div class="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="name">Nombre del paquete</label>
                        <input id="name" type="text" name="name" required minlength="3" maxlength="120" placeholder="Ejemplo: City tour Medellin">
                    </div>

                    <div class="form-group">
                        <label for="citySelect">Ciudad</label>
                        <select id="citySelect" name="city_id" required>
                            <option value="">Selecciona una ciudad</option>
                            <?php foreach ($cities as $c): ?>
                                <option value="<?= (int) $c['id'] ?>" <?= (int)($selectedCityId ?? 0) === (int)$c['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($c['ciudad'] ?? '') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-actions">
                        <button class="btn" type="submit"><i class="fas fa-save"></i> Guardar paquete</button>
                        <a class="btn btn-outline" href="/routes/web.php?url=packages/list">Cancelar</a>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            const form = document.getElementById('packageCreateForm');
            if (!form) return;
            form.addEventListener('submit', function(e){
                const name = form.name.value.trim();
                const city = form.city_id.value;
                const errors = [];
                if (name.length < 3) errors.push('El nombre del paquete debe tener al menos 3 caracteres');
                if (name.length > 120) errors.push('El nombre del paquete no puede exceder 120 caracteres');
                if (!city) errors.push('Debes seleccionar una ciudad');
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
