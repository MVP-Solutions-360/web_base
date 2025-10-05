<?php
if (!isset($error)) { $error = ''; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear País - Wilrop Colombia Travel</title>
    <meta name="description" content="Agrega un nuevo país al sistema Wilrop Colombia Travel.">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-content">
                    <div class="login-header">
                        <h2>Crear País</h2>
                        <p>Agrega un nuevo país al sistema</p>
                    </div>

                    <form id="countryCreateForm" class="login-form" method="POST" action="/routes/web.php?url=countries/store" novalidate>
                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle"></i>
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="pais">Nombre del país</label>
                            <div class="input-group">
                                <i class="fas fa-flag"></i>
                                <input type="text" id="pais" name="pais" minlength="3" maxlength="100" required placeholder="Ejemplo: Colombia">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <div class="input-group">
                                <i class="fas fa-align-left"></i>
                                <textarea id="descripcion" name="descripcion" rows="3" minlength="3" placeholder="Descripción del país..."></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-full">
                            <i class="fas fa-save"></i>
                            Guardar País
                        </button>
                    </form>
                </div>

                <div class="login-image">
                    <div class="login-bg">
                        <div class="login-overlay"></div>
                        <div class="login-text">
                            <h3>¡Agrega destinos únicos!</h3>
                            <p>Expande el catálogo de países y destinos en Wilrop Colombia Travel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function(){
            var errorMsg = <?php echo json_encode($error ?? ''); ?>;
            if (errorMsg) {
                if (window.Swal) {
                    Swal.fire({ icon:'error', title:'Errores de validación', html: errorMsg });
                } else {
                    alert(errorMsg.replace(/<br\s*\/?>(\r?\n)?/g, "\n"));
                }
            }
        })();
    </script>
    <script>
        (function(){
            const form = document.getElementById('countryCreateForm');
            if (!form) return;
            form.addEventListener('submit', function(e){
                const pais = form.pais.value.trim();
                const desc = (form.descripcion.value || '').trim();
                const errors = [];
                if (pais.length < 3) errors.push('El nombre del país debe tener al menos 3 caracteres');
                if (pais.length > 100) errors.push('El nombre del país no puede exceder 100 caracteres');
                if (desc && desc.length < 3) errors.push('La descripción es muy corta');
                if (errors.length) {
                    e.preventDefault();
                    if (typeof showNotification === 'function') {
                        showNotification(errors.join('\n'), 'error');
                    } else {
                        alert(errors.join('\n'));
                    }
                }
            });
        })();
    </script>
</body>
</html>
