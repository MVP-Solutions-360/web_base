<?php
if (!isset($city)) { $city = null; }
if (!isset($countries)) { $countries = []; }
if (!isset($error)) { $error = ''; }
if (!isset($db_error)) { $db_error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ciudad - Panel Admin</title>
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="/assets/css/admin.css">
    <link rel="stylesheet" href="/assets/css/admin-table.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <div class="admin-layout">
        <aside class="admin-sidebar">
            <?php include __DIR__ . "/../components/admin_sidebar.php"; ?>
        </aside>

        <main class="admin-main">
            <?php if (!empty($db_error)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($db_error) ?>
                </div>
            <?php endif; ?>

            <div class="admin-main__intro">
                <h1>Editar Ciudad</h1>
                <p class="muted">Actualiza la informacion de la ciudad seleccionada</p>
            </div>

            <section class="admin-card">
                <?php if (empty($city)): ?>
                    <p class="muted">No se encontro la ciudad solicitada.</p>
                    <a class="btn btn-outline" href="/routes/web.php?url=cities/list"><i class="fas fa-arrow-left"></i> Volver al listado</a>
                <?php else: ?>
                    <form id="cityEditForm" class="admin-form" method="POST" action="/routes/web.php?url=cities/update" novalidate>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($city['id']) ?>">

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="ciudad">Nombre de la ciudad</label>
                            <input type="text" id="ciudad" name="ciudad" minlength="3" maxlength="100" required value="<?= htmlspecialchars($city['ciudad'] ?? '') ?>">
                        </div>

                        <div class="form-group">
                            <label for="countrySelect">Pais</label>
                            <select id="countrySelect" name="country_id" required>
                                <option value="">Selecciona un pais</option>
                                <?php foreach ($countries as $countryOption): ?>
                                    <option value="<?= (int) $countryOption['id'] ?>" <?= (int) ($city['pais_id'] ?? 0) === (int) $countryOption['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($countryOption['pais']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea id="descripcion" name="descripcion" rows="4" minlength="3" placeholder="Descripcion del destino..."><?= htmlspecialchars($city['descripcion'] ?? '') ?></textarea>
                        </div>

                        <?php $backUrl = ($city['pais_id'] ?? null) ? '/routes/web.php?url=cities/list&country_id=' . (int) $city['pais_id'] : '/routes/web.php?url=cities/list'; ?>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar ciudad
                            </button>
                            <a href="<?= htmlspecialchars($backUrl, ENT_QUOTES) ?>" class="btn btn-outline">Cancelar</a>
                        </div>
                    </form>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <?php include __DIR__ . "/../components/footer.php"; ?>

    <script src="/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            var errorMsg = <?= json_encode($error ?? '') ?>;
            if (errorMsg) {
                if (window.Swal) {
                    Swal.fire({ icon: 'error', title: 'Errores de validacion', html: errorMsg });
                } else {
                    alert(errorMsg.replace(/<br\s*\/?>(\r?\n)?/g, '\n'));
                }
            }
        })();
    </script>
    <script>
        (function(){
            const form = document.getElementById('cityEditForm');
            if (!form) return;
            form.addEventListener('submit', function(e){
                const name = form.ciudad.value.trim();
                const desc = (form.descripcion.value || '').trim();
                const country = form.country_id.value;
                const errors = [];
                if (name.length < 3) errors.push('El nombre de la ciudad debe tener al menos 3 caracteres');
                if (name.length > 100) errors.push('El nombre de la ciudad no puede exceder 100 caracteres');
                if (!country) errors.push('Debes seleccionar un pais');
                if (desc && desc.length < 3) errors.push('La descripcion es muy corta');
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
