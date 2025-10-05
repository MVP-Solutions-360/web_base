<!-- Listado de paquetes -->
<h1>Paquetes</h1>
<a href="/routes/web.php?url=packages/create">Agregar paquete</a>
<table>
    <!-- ...tabla de paquetes... -->
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
        if (status === 'created') { title = 'Paquete creado'; text = name ? `Se creó "${name}" correctamente` : ''; }
        else if (status === 'updated') { title = 'Paquete actualizado'; text = name ? `Se actualizó "${name}" correctamente` : ''; }
        else if (status === 'deleted') { title = 'Paquete eliminado'; text = name ? `Se eliminó "${name}" correctamente` : ''; }
        if (window.Swal) Swal.fire({ icon: 'success', title, text, timer: 2200, showConfirmButton: false });
        const onlyUrl = url.searchParams.get('url') || 'packages/list';
        const keep = [];
        const city = url.searchParams.get('city_id');
        if (city) keep.push('city_id=' + encodeURIComponent(city));
        const qs = ['url=' + encodeURIComponent(onlyUrl)].concat(keep).join('&');
        const newUrl = `${location.pathname}?${qs}`;
        history.replaceState(null, '', newUrl);
      }
    } catch (e) {}
  })();

  (function(){
    const links = document.querySelectorAll('.delete-package');
    links.forEach(link => {
      link.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.getAttribute('data-url');
        const name = this.getAttribute('data-name') || 'este paquete';
        if (!window.Swal) { if (confirm(`¿Eliminar ${name}?`)) location.href = url; return; }
        Swal.fire({
          title: '¿Eliminar paquete?',
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
