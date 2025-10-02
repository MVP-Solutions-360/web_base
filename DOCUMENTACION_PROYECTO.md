# Documentación Detallada del Proyecto Wilrop

## Estructura General

```
├── index.php
├── styles.css
├── scripts.js
├── wilrop_database.sql
├── README.md
├── README-SISTEMA-USUARIOS.md
├── DOCUMENTACION_PROYECTO.md
├── src/
│   ├── admin/
│   ├── colombia/
│   ├── dominicana/
│   └── producto/
├── app/
│   ├── Controllers/
│   ├── Models/
│   ├── Views/
│   └── Modules/
```

---

## Descripción de Carpetas y Archivos

### Raíz
- **index.php**: Página principal, navegación y acceso a módulos.
- **styles.css**: Hoja de estilos global, layout, responsive, animaciones.
- **scripts.js**: Lógica JS para menús, carrusel, validaciones, interactividad.
- **wilrop_database.sql**: Esquema completo de la base de datos.
- **README.md / README-SISTEMA-USUARIOS.md**: Documentación general y de usuarios.
- **DOCUMENTACION_PROYECTO.md**: Documentación técnica y funcional del proyecto.

### src/admin
- **admin.php**: Panel principal de administración.
- **assign-roles.php**: Asignación de roles y permisos.
- **conexion.php**: Conexión a la base de datos.
- **config-permisos.php**: Configuración de permisos.
- **delete-user.php**: Eliminación de usuarios.
- **destino.php / pais.php**: Gestión de destinos y países.
- **install.php / install_permissions.php**: Instalación y configuración inicial.
- **login.php / logout.php / register.php / register_adapted.php / register_redirect.php**: Autenticación y registro.
- **manage-users.php / manage-users_adapted.php**: Gestión de usuarios.

### src/colombia y src/dominicana
- **colombia.php / dominicana.php**: Vistas específicas para cada destino.

### src/producto
- **products.php**: Listado y gestión de productos turísticos.
- **product-detail.php**: Vista de detalle de producto.

### app/ (Pseudo-MVC)
#### Controllers
- **ProductoController.php**: Lógica de negocio para productos (CRUD completo).
#### Models
- **Producto.php**: Modelo de producto, campos alineados con el CRM.
#### Views
- **productos_list.php**: Listado de productos.
- **productos_view.php**: Detalle de producto.
- **productos_create.php**: Formulario para crear producto.
- **productos_edit.php**: Formulario para editar producto.
- **productos_delete.php**: Confirmación y lógica para eliminar producto.
#### Modules/Productos
- **README.md**: Documentación del módulo de productos y rutas de vistas/controlador/modelo.

---

## Base de Datos (wilrop_database.sql)
- Tablas: usuarios, productos, paises, destinos, permisos, detalle_permisos, carritos, carrito_items, blog_posts, sobre_nosotros.
- Estructura relacional, claves foráneas, integridad referencial.
- Campos de productos alineados con el CRM: title, origin, destination, include, no_include, itinerary, details, status, valid_from, valid_until, available_units, main_image, gallery_images, document_file.

---

## CSS (styles.css)
- Layout general, grid, flexbox, cards, formularios, navegación, responsive.
- Animaciones, efectos hover, colores y tipografía.
- Clases para cada sección y módulo.

---

## JS (scripts.js)
- Menú hamburguesa y navegación móvil.
- Carrusel de imágenes en el hero.
- Validaciones de formularios.
- Interacciones de usuario y lógica dinámica.

---

## Documentación de Módulo Productos (app/Modules/Productos/README.md)
- Listar: `app/Views/productos_list.php`
- Ver: `app/Views/productos_view.php`
- Crear: `app/Views/productos_create.php`
- Editar: `app/Views/productos_edit.php`
- Eliminar: `app/Views/productos_delete.php`
- Controlador: `app/Controllers/ProductoController.php`
- Modelo: `app/Models/Producto.php`
- Todos los campos coinciden con la estructura del CRM para integración directa.

---

## Organización y Lógica
- Modularización por funcionalidad (admin, productos, destinos).
- Separación de lógica (Controllers), datos (Models) y vistas (Views).
- Recursos estáticos centralizados.
- Documentación y archivos README presentes.
- Pruebas y scripts agrupados.

---

## Recomendaciones
- Mantener la modularidad y separación de responsabilidades.
- Documentar cada módulo y función relevante.
- Usar rutas absolutas y centralizar configuración.
- Preparar integración directa con el CRM usando los modelos y campos definidos.

---