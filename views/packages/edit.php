<!-- Formulario para editar paquete -->
<form method="POST" action="/routes/web.php?url=packages/update">
    <label>Nombre del paquete:</label>
    <input type="text" name="name" value="<?= $package['name'] ?>" required>
    <label>Ciudad:</label>
    <select name="city_id">
        <!-- ...opciones de ciudades... -->
    </select>
    <button type="submit">Actualizar</button>
</form>
