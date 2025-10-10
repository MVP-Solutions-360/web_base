<?php
if (!isset($country)) { $country = null; }
if (!isset($error)) { $error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pais - Panel Admin</title>
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
                <h1>Editar Pais</h1>
                <p>Actualiza la informacion del pais</p>
            </div>

            <section class="admin-card form-container">
                <?php if (empty($country)): ?>
                    <p class="muted">Pais no encontrado.</p>
                    <a class="btn btn-outline" href="/routes/web.php?url=countries/list"><i class="fas fa-arrow-left"></i> Volver al listado</a>
                <?php else: ?>
                    <form id="countryEditForm" class="admin-form" method="POST" action="/routes/web.php?url=countries/update" novalidate>
                        <input type="hidden" name="id" value="<?= htmlspecialchars($country['id'] ?? ($id ?? '')) ?>">

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?= $error ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="pais">Nombre del pais</label>
                            <input type="text" id="pais" name="pais" minlength="3" maxlength="100" required value="<?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea id="descripcion" name="descripcion" rows="3" minlength="3"><?= htmlspecialchars($country['descripcion'] ?? '') ?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar pais
                            </button>
                            <a href="/routes/web.php?url=countries/list" class="btn btn-outline">Cancelar</a>
                        </div>
                    </form>
                <?php endif; ?>
            </section>
        </main>
    </div>

    <script src="/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            var errorMsg = <?= json_encode($error ?? '') ?>;
            if (errorMsg) {
                if (window.Swal) {
                    Swal.fire({ icon:'error', title:'Errores de validacion', html: errorMsg });
                } else {
                    alert(errorMsg.replace(/<br\s*\/?>(\r?\n)?/g, "\n"));
                }
            }
        })();
    </script>
    <script>
        (function(){
            const form = document.getElementById('countryEditForm');
            if (!form) return;
            form.addEventListener('submit', function(e){
                const pais = form.pais.value.trim();
                const desc = (form.descripcion.value || '').trim();
                const errors = [];
                if (pais.length < 3) errors.push('El nombre del pais debe tener al menos 3 caracteres');
                if (pais.length > 100) errors.push('El nombre del pais no puede exceder 100 caracteres');
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
