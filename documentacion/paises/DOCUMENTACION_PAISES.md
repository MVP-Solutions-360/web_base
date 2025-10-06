# Documentación del Módulo de Países

## Resumen General

El módulo de países es una parte integral del sistema Wilrop Colombia Travel, que permite la gestión completa de países y sus destinos asociados. Este módulo incluye funcionalidades de administración (CRUD) para países, vistas detalladas de países con sus ciudades, y páginas promocionales públicas para países específicos como Colombia y República Dominicana.

El sistema utiliza una arquitectura MVC (Modelo-Vista-Controlador) con PHP puro, PDO para interacciones con base de datos MySQL, y vistas HTML/CSS/JavaScript con Bootstrap y Font Awesome para la interfaz.

## Estructura del Controlador (CountryController.php)

### Métodos del Controlador

#### `index()`
- **Propósito**: Muestra la lista de todos los países registrados.
- **Funcionalidad**:
  - Consulta la tabla `paises` ordenada por nombre.
  - Maneja errores de conexión a base de datos.
  - Incluye la vista `views/countries/list.php`.
- **Parámetros**: Ninguno.
- **Retorno**: Incluye la vista de listado.

#### `show($id)`
- **Propósito**: Muestra los detalles de un país específico y sus ciudades asociadas.
- **Funcionalidad**:
  - Consulta el país por ID.
  - Consulta las ciudades relacionadas (tabla `destinos`) ordenadas por nombre.
  - Maneja errores de conexión.
  - Incluye la vista `views/countries/show.php`.
- **Parámetros**: `$id` (integer) - ID del país.
- **Retorno**: Incluye la vista de detalle.

#### `create($country_id = null)`
- **Propósito**: Muestra el formulario para crear un nuevo país.
- **Funcionalidad**: Incluye la vista `views/countries/create.php`.
- **Parámetros**: `$country_id` (opcional) - No utilizado actualmente.
- **Retorno**: Incluye la vista de creación.

#### `store($data)`
- **Propósito**: Procesa la creación de un nuevo país.
- **Funcionalidad**:
  - Valida los datos de entrada.
  - Inserta el registro en la tabla `paises`.
  - Redirige con mensaje de éxito o muestra errores.
- **Parámetros**: `$data` (array) - Datos del formulario POST.
- **Validación**: Nombre obligatorio (3-100 caracteres), descripción opcional (mínimo 3 caracteres si presente).
- **Retorno**: Redirección a listado con status.

#### `edit($id)`
- **Propósito**: Muestra el formulario para editar un país existente.
- **Funcionalidad**:
  - Consulta el país por ID.
  - Incluye la vista `views/countries/edit.php`.
- **Parámetros**: `$id` (integer) - ID del país.
- **Retorno**: Incluye la vista de edición.

#### `update($id, $data)`
- **Propósito**: Procesa la actualización de un país existente.
- **Funcionalidad**:
  - Valida los datos de entrada.
  - Actualiza el registro en la tabla `paises`.
  - Redirige con mensaje de éxito o muestra errores.
- **Parámetros**: `$id` (integer), `$data` (array).
- **Validación**: Igual que `store()`.
- **Retorno**: Redirección a listado con status.

#### `delete($id)`
- **Propósito**: Elimina un país del sistema.
- **Funcionalidad**:
  - Elimina el registro de la tabla `paises` (las ciudades se eliminan automáticamente por CASCADE).
  - Redirige con mensaje de éxito.
- **Parámetros**: `$id` (integer) - ID del país.
- **Retorno**: Redirección a listado con status.

## Descripciones de las Vistas

### Vistas de Administración

#### `views/countries/list.php`
- **Tipo**: Vista de listado administrativo.
- **Características**:
  - Tabla responsive con países.
  - Columnas: Nombre (enlace a detalle), Acciones.
  - Acciones disponibles: Ver detalle, Editar, Eliminar, Ver ciudades.
  - Integración con SweetAlert para confirmaciones de eliminación.
  - Mensajes automáticos de estado (creado/editado/eliminado).
  - Sidebar administrativo y navegación.
- **Estilos**: `admin.css`, `admin-table.css`, Font Awesome.

#### `views/countries/show.php`
- **Tipo**: Vista de detalle administrativo.
- **Características**:
  - Información del país (nombre, descripción, fecha de creación).
  - Tabla de ciudades asociadas con descripción y fecha.
  - Botones para agregar ciudad y volver al listado.
  - Manejo de errores de base de datos.
- **Estilos**: `admin.css`, `admin-table.css`.

#### `views/countries/edit.php`
- **Tipo**: Formulario de edición.
- **Características**:
  - Campos: Nombre del país (requerido), Descripción (opcional).
  - Validación client-side básica.
  - Integración con SweetAlert para errores.
  - Sidebar administrativo.
- **Estilos**: `admin.css`.

#### `views/countries/create.php`
- **Tipo**: Formulario de creación.
- **Características**:
  - Diseño tipo login (container centrado).
  - Campos: Nombre del país, Descripción.
  - Validación client-side y server-side.
  - Mensajes de error integrados.
  - Sin sidebar (diseño minimalista).
- **Estilos**: `styles.css`.

## Aplicación de Estilos a las Vistas

Esta sección detalla cómo se aplican los estilos CSS a las vistas administrativas de países (create.php, edit.php, list.php, show.php), incluyendo los archivos CSS incluidos, las clases principales utilizadas y cómo contribuyen al diseño y funcionalidad de la interfaz.

### Vistas Administrativas con Layout de Admin

Las vistas `edit.php`, `list.php` y `show.php` comparten un diseño administrativo consistente que utiliza un layout de grid con sidebar lateral. Estas vistas incluyen los siguientes archivos CSS:

- **`/assets/css/styles.css`**: Estilos globales base (fuentes, colores generales, utilidades).
- **`/assets/css/admin.css`**: Define el layout administrativo principal:
  - `.admin-layout`: Grid de 2 columnas (sidebar 2fr, contenido 5fr).
  - `.admin-sidebar`: Barra lateral azul (#0d47a1) con navegación.
  - `.admin-main`: Área de contenido principal con padding.
  - `.admin-header`: Encabezado de página con título y descripción.
  - `.admin-card`: Tarjetas blancas con sombra y bordes redondeados.
  - `.btn`: Botones azules con hover effects.
- **`/assets/css/admin-table.css`**: Estilos específicos para tablas y formularios:
  - `.admin-toolbar`: Barra de herramientas con título y acciones.
  - `.table-container`: Contenedor de tabla con fondo blanco y sombra.
  - `.admin-table`: Tabla responsive con headers azules y hover effects.
  - `.actions`: Enlaces de acciones (editar, eliminar) con colores y transiciones.
  - `.form-container`: Contenedor de formularios con padding y sombra.
  - `.form-group`: Grupos de campos con labels e inputs estilizados.
  - `.form-actions`: Botones de acción alineados horizontalmente.
- **Google Fonts (Poppins)**: Tipografía moderna para todo el texto.
- **Font Awesome**: Iconos para botones, labels y elementos visuales.

#### `views/countries/list.php`
- **Layout**: Utiliza `.admin-layout` para estructura sidebar + contenido.
- **Componentes principales**:
  - `.admin-header`: Título "Gestión de Países" y descripción.
  - `.admin-toolbar`: Barra con "Listado de Países" y botón "Crear país".
  - `.table-container` y `.admin-table`: Tabla de países con columnas "Nombre" y "Acciones".
  - `.actions`: Enlaces para editar, eliminar y ver ciudades, con iconos Font Awesome.
- **Estilos adicionales**: `.alert` para errores de BD, `.empty` para estado sin datos.
- **Responsividad**: El layout se adapta a móviles colapsando el sidebar.

#### `views/countries/show.php`
- **Layout**: Similar a list.php, con `.admin-layout`.
- **Componentes principales**:
  - `.admin-main__intro`: Introducción con nombre del país y fecha de registro.
  - `.admin-card`: Secciones para descripción y lista de ciudades.
  - `.admin-toolbar__actions`: Botones "Agregar ciudad" y "Volver al listado".
  - `.table-container` y `.admin-table`: Tabla de ciudades con columnas "Ciudad", "Descripción", "Creado".
- **Clases específicas**: `.muted` para texto secundario, `.btn-primary` y `.btn-outline` para botones diferenciados.
- **Manejo de estados**: Muestra tarjeta de error si el país no existe.

#### `views/countries/edit.php`
- **Layout**: Admin layout con sidebar.
- **Componentes principales**:
  - `.admin-header`: Título "Editar País".
  - `.form-container`: Formulario centrado con campos pre-llenados.
  - `.form-group`: Campos "Nombre del país" (input) y "Descripción" (textarea), con iconos.
  - `.form-actions`: Botones "Actualizar País" y "Volver".
- **Validación visual**: Inputs con focus states (borde azul, sombra).
- **Integración**: Incluye navbar y footer globales.

### Vista de Creación (Sin Layout Admin)

#### `views/countries/create.php`
- **Archivos CSS incluidos**:
  - **`/assets/css/styles.css`**: Estilos base, incluyendo clases de login.
  - **Google Fonts (Poppins)** y **Font Awesome**.
- **Diseño**: Utiliza un diseño tipo "login" centrado, sin sidebar administrativo.
- **Componentes principales**:
  - `.login-section`: Sección full-width con fondo.
  - `.login-container`: Contenedor grid de 2 columnas (formulario + imagen).
  - `.login-content`: Formulario con header, campos y botón.
  - `.form-group` y `.input-group`: Campos con iconos y placeholders.
  - `.btn-primary`: Botón de submit con icono.
  - `.login-image`: Panel derecho con overlay y texto promocional.
- **Estilos específicos**: Fondos gradientes, overlays, texto centrado. No utiliza `admin.css` ni `admin-table.css`.
- **Propósito**: Diseño minimalista y atractivo para creación inicial, diferente del panel admin.

### Consideraciones Generales de Estilos
- **Consistencia**: Las vistas admin comparten clases comunes para mantener uniformidad.
- **Responsividad**: Todas las vistas son responsive, con breakpoints en 992px (desktop) y 768px (mobile).
- **Accesibilidad**: Uso de colores contrastantes, labels asociados, y transiciones suaves.
- **Mantenimiento**: Los estilos están modularizados en archivos separados para facilitar actualizaciones.
- **Dependencias externas**: Font Awesome y Google Fonts se cargan desde CDN para optimización.

Esta documentación de estilos facilita la replicación del diseño en otros módulos administrativos.

### Vistas Públicas

#### `views/countries/colombia.php`
- **Tipo**: Página promocional pública.
- **Características**:
  - Hero section con carrusel de imágenes.
  - Secciones: Destinos principales, Antioquia especial, Experiencias únicas, Información práctica.
  - Video promocional embebido.
  - Call-to-action para contacto y paquetes.
  - Contenido específico de Colombia: cultura paisa, destinos como Bogotá, Cartagena, Medellín, etc.
- **Estilos**: `styles.css`, Font Awesome.

#### `views/countries/dominicana.php`
- **Tipo**: Página promocional pública.
- **Características**:
  - Estructura similar a colombia.php.
  - Contenido específico de República Dominicana: Punta Cana, Santo Domingo, Puerto Plata, Samaná.
  - Secciones: Destinos, Experiencias, Cultura, Información práctica.
  - Carrusel dinámico con JavaScript.
- **Estilos**: `styles.css`, Font Awesome.

## Esquema de Base de Datos

### Tabla `paises`
```sql
CREATE TABLE paises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pais VARCHAR(100) NOT NULL,
    descripcion TEXT,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_pais (pais)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

### Tabla `destinos`
```sql
CREATE TABLE destinos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pais_id INT NOT NULL,
    ciudad VARCHAR(100) NOT NULL,
    descripcion TEXT,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pais_id) REFERENCES paises(id) ON DELETE CASCADE,
    UNIQUE KEY unique_ciudad_pais (pais_id, ciudad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

**Relaciones**: Un país puede tener múltiples ciudades (1:N).

## Reglas de Validación

### Validación de País
- **Nombre**:
  - Obligatorio.
  - Longitud: 3-100 caracteres.
  - Tipo: Texto (string).
- **Descripción**:
  - Opcional.
  - Si presente: mínimo 3 caracteres.
  - Tipo: Texto largo (textarea).

### Validación del Sistema
- **Server-side**: Implementada en métodos `store()` y `update()` del controlador.
- **Client-side**: Validación básica en formularios con JavaScript.
- **Mensajes de error**: Mostrados en la vista correspondiente o via SweetAlert.

## Flujos de Usuario

### Flujo Administrativo
1. **Listado**: Usuario accede a `/countries/list` → ve tabla de países.
2. **Crear**: Click en "Crear país" → formulario → validación → redirección con éxito.
3. **Ver detalle**: Click en nombre del país → vista detallada con ciudades.
4. **Editar**: Click en "Editar" → formulario pre-llenado → validación → redirección.
5. **Eliminar**: Click en "Eliminar" → confirmación SweetAlert → eliminación → redirección.
6. **Ver ciudades**: Click en "Ver Ciudades" → redirección a módulo de ciudades.

### Flujo Público
1. **Colombia**: Usuario accede a página promocional → explora destinos y experiencias.
2. **República Dominicana**: Similar, con contenido específico del país.

## Características Especiales

### Notificaciones y Feedback
- **SweetAlert**: Usado para confirmaciones de eliminación y mensajes de estado.
- **Mensajes automáticos**: Basados en parámetros URL (`status`, `name`).
- **Estados**: `created`, `updated`, `deleted`.

### Seguridad y Manejo de Errores
- **PDO**: Consultas preparadas para prevenir SQL injection.
- **Try-catch**: Manejo de excepciones en operaciones de BD.
- **Validación**: Tanto client-side como server-side.
- **Sesiones**: Verificación de sesión en vistas administrativas.

### Interfaz de Usuario
- **Responsive**: Diseño adaptable a diferentes dispositivos.
- **Admin layout**: Sidebar lateral para navegación administrativa.
- **Iconografía**: Font Awesome para elementos visuales.
- **Estilos**: CSS modular (`admin.css`, `admin-table.css`, `styles.css`).

### Integración con Otros Módulos
- **Ciudades**: Relación directa via `pais_id`.
- **Productos**: Países usados en catálogo de productos.
- **Rutas**: Manejado via `routes/web.php`.
- **Autenticación**: Verificación de permisos implícita.

## Consideraciones Técnicas

- **Dependencias**: Requiere configuración de base de datos (`config/database.php`).
- **Rutas**: Todas las URLs pasan por `routes/web.php`.
- **Assets**: CSS, JS y imágenes en `/assets/` y `/public/imagenes/`.
- **Codificación**: UTF-8 para soporte de caracteres especiales.
- **Framework**: PHP puro con estructura MVC personalizada.

Esta documentación proporciona una visión completa del módulo de países, facilitando el mantenimiento, extensión y comprensión del sistema.
