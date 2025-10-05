<!-- Formulario para editar tour -->
<form method="POST" action="/routes/web.php?url=tours/update">
    <label>Nombre del tour:</label>
    <input type="text" name="name" value="<?= $tour['name'] ?>" required>
    <label>Paquete:</label>
    <select name="package_id">
        <!-- ...opciones de paquetes... -->
    </select>
    <button type="submit">Actualizar</button>
</form>
