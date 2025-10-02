<!-- Formulario para editar ciudad -->
<form method="POST" action="/cities/update">
    <label>Nombre de la ciudad:</label>
    <input type="text" name="name" value="<?= $city['name'] ?>" required>
    <label>País:</label>
    <select name="country_id">
        <!-- ...opciones de países... -->
    </select>
    <button type="submit">Actualizar</button>
</form>
