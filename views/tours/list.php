<!-- Listado de tours -->
<h1>Tours</h1>
<a href="/routes/web.php?url=tours/create">Agregar tour</a>
<table>
    <!-- ...tabla de tours... -->
</table>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Avisos de éxito (created/updated/deleted)
  (function(){
    try {
      const url = new URL(window.location.href);
      const status = url.searchParams.get('status');
      const name = url.searchParams.get('name') || '';
      if (status) {
        let title = 'Operación exitosa';
        let text = '';
        if (status === 'created') { title = 'Tour creado'; text = name ? `Se creó "${name}" correctamente` : ''; }
        else if (status === 'updated') { title = 'Tour actualizado'; text = name ? `Se actualizó "${name}" correctamente` : ''; }
        else if (status === 'deleted') { title = 'Tour eliminado'; text = name ? `Se eliminó "${name}" correctamente` : ''; }
        if (window.Swal) Swal.fire({ icon: 'success', title, text, timer: 2200, showConfirmButton: false });
        const onlyUrl = url.searchParams.get('url') || 'tours/list';
        const keep = [];
        const pkg = url.searchParams.get('package_id');
        if (pkg) keep.push('package_id=' + encodeURIComponent(pkg));
        const qs = ['url=' + encodeURIComponent(onlyUrl)].concat(keep).join('&');
        const newUrl = `${location.pathname}?${qs}`;
        history.replaceState(null, '', newUrl);
      }
    } catch (e) {}
  })();

  (function(){
    const links = document.querySelectorAll('.delete-tour');
    links.forEach(link => {
      link.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.getAttribute('data-url');
        const name = this.getAttribute('data-name') || 'este tour';
        if (!window.Swal) { if (confirm(`¿Eliminar ${name}?`)) location.href = url; return; }
        Swal.fire({
          title: '¿Eliminar tour?',
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
