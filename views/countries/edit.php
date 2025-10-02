<!-- Formulario para editar país -->
<form method="POST" action="/countries/update">
    <label>Nombre del país:</label>
    <input type="text" name="name" value="<?= $country['name'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
