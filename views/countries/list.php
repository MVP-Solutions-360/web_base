<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
$current = $_SERVER['REQUEST_URI'] ?? '';
if (!function_exists('is_active')) {
    function is_active($needle) {
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        return strpos($uri, $needle) !== false ? 'active' : '';
    }
}
?>
<!-- Listado de países -->
<h1>Países</h1>
<a class="admin-menu__subitem <?php echo is_active('countries/create'); ?>" href="/routes/web.php?url=countries/create">Crear</a>
<?php if (!empty($db_error)): ?>
<div class="alert alert-danger" style="margin:1rem 0;">
  <?= htmlspecialchars($db_error) ?>
  <div style="color:#777;font-size:.9rem;">Verifica config/database.php y las credenciales de conexión.</div>
</div>
<?php endif; ?>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($countries)): ?>
        <tr>
            <td colspan="2">No hay países registrados.</td>
        </tr>
        <?php else: foreach ($countries as $country): ?>
        <tr>
            <td>
                <a href="/routes/web.php?url=cities/list&country_id=<?= $country['id'] ?>">
                    <?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>
                </a>
            </td>
            <td>
                <a href="/routes/web.php?url=countries/edit&id=<?= $country['id'] ?>">Editar</a>
                <a href="#" class="delete-country" data-url="/routes/web.php?url=countries/delete&id=<?= $country['id'] ?>" data-name="<?= htmlspecialchars($country['pais'] ?? ($country['name'] ?? '')) ?>">Eliminar</a>
                <a href="/routes/web.php?url=cities/list&country_id=<?= $country['id'] ?>">Ver Ciudades</a>
            </td>
        </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  (function(){
    try {
      const url = new URL(window.location.href);
      const status = url.searchParams.get('status');
      const name = url.searchParams.get('name') || '';
      if (status) {
        let title = 'Operación exitosa';
        let text = '';
        if (status === 'created') {
          title = 'País creado';
          text = name ? `Se creó "${name}" correctamente` : '';
        } else if (status === 'updated') {
          title = 'País actualizado';
          text = name ? `Se actualizó "${name}" correctamente` : '';
        } else if (status === 'deleted') {
          title = 'País eliminado';
          text = name ? `Se eliminó "${name}" correctamente` : '';
        }
        if (window.Swal) {
          Swal.fire({ icon: 'success', title, text, timer: 2200, showConfirmButton: false });
        }
        const onlyUrl = url.searchParams.get('url') || 'countries/list';
        const newUrl = `${location.pathname}?url=${encodeURIComponent(onlyUrl)}`;
        history.replaceState(null, '', newUrl);
      }
    } catch (e) { /* ignore */ }
  })();

  // Confirmación de borrado con SweetAlert
  (function(){
    const links = document.querySelectorAll('.delete-country');
    links.forEach(link => {
      link.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.getAttribute('data-url');
        const name = this.getAttribute('data-name') || 'este país';
        if (!window.Swal) { if (confirm(`¿Eliminar ${name}?`)) location.href = url; return; }
        Swal.fire({
          title: '¿Eliminar país?',
          text: `Esta acción eliminará "${name}"`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, eliminar',
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
