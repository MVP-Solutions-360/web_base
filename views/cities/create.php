<!-- Formulario para crear ciudad -->
<form method="POST" action="/cities/store">
    <label>Nombre de la ciudad:</label>
    <input type="text" name="name" required>
    <label>País:</label>
    <select name="country_id">
        <!-- ...opciones de países... -->
    </select>
    <button type="submit">Guardar</button>
</form>
