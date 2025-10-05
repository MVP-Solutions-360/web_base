<!-- Listado de ciudades -->
<h1>Ciudades</h1>
<a href="/routes/web.php?url=cities/create">Agregar ciudad</a>
<table>
    <!-- ...tabla de ciudades... -->
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
        if (status === 'created') { title = 'Ciudad creada'; text = name ? `Se creó "${name}" correctamente` : ''; }
        else if (status === 'updated') { title = 'Ciudad actualizada'; text = name ? `Se actualizó "${name}" correctamente` : ''; }
        else if (status === 'deleted') { title = 'Ciudad eliminada'; text = name ? `Se eliminó "${name}" correctamente` : ''; }
        if (window.Swal) Swal.fire({ icon: 'success', title, text, timer: 2200, showConfirmButton: false });
        const onlyUrl = url.searchParams.get('url') || 'cities/list';
        const keep = [];
        const country = url.searchParams.get('country_id');
        if (country) keep.push('country_id=' + encodeURIComponent(country));
        const qs = ['url=' + encodeURIComponent(onlyUrl)].concat(keep).join('&');
        const newUrl = `${location.pathname}?${qs}`;
        history.replaceState(null, '', newUrl);
      }
    } catch (e) {}
  })();

  (function(){
    const links = document.querySelectorAll('.delete-city');
    links.forEach(link => {
      link.addEventListener('click', function(e){
        e.preventDefault();
        const url = this.getAttribute('data-url');
        const name = this.getAttribute('data-name') || 'esta ciudad';
        if (!window.Swal) { if (confirm(`¿Eliminar ${name}?`)) location.href = url; return; }
        Swal.fire({
          title: '¿Eliminar ciudad?',
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
