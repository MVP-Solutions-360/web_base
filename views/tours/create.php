<!-- Formulario para crear tour -->
<form method="POST" action="/tours/store">
    <label>Nombre del tour:</label>
    <input type="text" name="name" required>
    <label>Paquete:</label>
    <select name="package_id">
        <!-- ...opciones de paquetes... -->
    </select>
    <button type="submit">Guardar</button>
</form>
