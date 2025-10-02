<!-- Formulario para crear paquete -->
<form method="POST" action="/packages/store">
    <label>Nombre del paquete:</label>
    <input type="text" name="name" required>
    <label>Ciudad:</label>
    <select name="city_id">
        <!-- ...opciones de ciudades... -->
    </select>
    <button type="submit">Guardar</button>
</form>
