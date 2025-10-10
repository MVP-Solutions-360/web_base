# Guía de estilos de administración

Este documento describe cómo está estructurada la vista principal de administración (`views/admin/admin.php`) y cómo se relaciona con los estilos definidos en `assets/css/admin_panel.css` (referido en algunas conversaciones como “admin_paises.css”). Incluye un mapa de clases, patrones de uso y recomendaciones para extender el panel a otras vistas.

## Objetivo y alcance

- Proveer un layout consistente para todo el panel (dashboard, listados, formularios).
- Estandarizar tarjetas, botones y tipografía.
- Definir un grid responsive para módulos del panel.

## Estructura HTML base (admin.php)

La vista `views/admin/admin.php` sigue esta estructura:

```html
<body>
  <!-- Navbar fija superior -->
  <?php include __DIR__ . '/../components/navbar.php'; ?>

  <div class="admin-wrapper">
    <!-- Sidebar fija (izquierda) -->
    <?php include __DIR__ . '/../components/admin_sidebar.php'; ?>

    <!-- Contenido principal -->
    <main class="admin-content">
      <div class="admin-header">
        <h1>Título del panel</h1>
        <p>Descripción / subtítulo.</p>
      </div>

      <!-- Tarjetas del panel en grid -->
      <div class="admin-grid">
        <div class="admin-card">
          <h3>Módulo</h3>
          <p>Descripción del módulo.</p>
          <a class="btn" href="#">Acción</a>
        </div>
        <!-- ... más .admin-card ... -->
      </div>
    </main>
  </div>
</body>
```

Puntos clave:

- `admin-wrapper` distribuye sidebar y contenido.
- `admin_sidebar.php` imprime la navegación lateral con clases específicas (ver sección Sidebar).
- `admin-content` aloja el contenido del dashboard o de cada módulo.
- `admin-header` define título y subtítulo del área actual.
- `admin-grid` y `admin-card` componen el tablero de accesos.

## Hoja de estilos: assets/css/admin_panel.css

El archivo define variables de color y los bloques principales del layout.

### Variables y base

- `:root` define paleta: `--primary`, `--primary-hover`, `--light-bg`, `--white`, `--text`, `--muted`.
- Reset ligero en `*` y tipografía base en `body`.

### Navbar

- `.header` fija el contenedor del navbar al tope con sombra.
- `.navbar .nav-container`, `.nav-menu`, `.nav-link`, `.hamburger`, `.bar`: utilidades para el menú superior.

Nota: El archivo `views/components/navbar.php` es el responsable de imprimir la estructura; estas clases la estilizan.

### Layout principal

- `.admin-wrapper`: contenedor flex de todo el panel, con `margin-top` para compensar la altura del navbar fijo (70px).

### Sidebar

- `.admin-sidebar`: ancho fijo (250px), color de fondo `--primary`, posición fija entre `top: 70px` y `bottom: 0` para mantenerlo visible.
- Scroll estilizado con `::-webkit-scrollbar`.
- Bloques auxiliares:
  - `.admin-user`, `.admin-user__info` para encabezado de usuario.
  - `.admin-menu`, `.admin-menu__item`, `.admin-menu__subitem`, `.admin-menu__group-title`, `.active` para navegación.

Estas clases son usadas por `views/components/admin_sidebar.php`.

### Contenido

- `.admin-content`: genera un margen izquierdo igual al ancho de la sidebar (`margin-left: 250px`) y paddings internos; también establece `min-height` respecto a la altura del navbar.
- `.admin-header h1` y `.admin-header p`: tipografías y colores para títulos/subtítulos.

### Tarjetas y grid

- `.admin-grid`: grid responsive `repeat(auto-fit, minmax(240px, 1fr))` con `gap: 20px`.
- `.admin-card`: tarjeta con fondo `--white`, borde redondeado, sombra y transición; hover eleva la tarjeta.
- `.admin-card h3`, `.admin-card p`: colores y espaciado.
- `.btn`: botón primario alineado con la paleta; hover en `--primary-hover`.

### Responsividad

- Breakpoint `max-width: 992px`:
  - `.admin-sidebar` pasa a fixed off-canvas (`left: -260px`) con clase `.active` para mostrarla.
  - `.admin-content` quita el `margin-left` y reduce paddings.
  - `.hamburger` se muestra para manejar el toggle de sidebar.

## Mapa HTML ↔ clases CSS

- Layout: `admin-wrapper` → Sidebar (`admin-sidebar`) + Main (`admin-content`).
- Encabezado de vista: `admin-header` con `h1` y `p`.
- Secciones en tablero: `admin-grid` conteniendo varias `admin-card`.
- Botones de acción en tarjetas: `a.btn`.

## Recomendaciones de uso

- Siempre incluir `admin_panel.css` en las vistas de administración; evita mezclar con hojas ajenas al panel salvo utilidades globales necesarias.
- Mantener la altura del navbar en 70px; si cambias esa altura, ajusta `margin-top` en `.admin-wrapper` y `top` en `.admin-sidebar`.
- Para nuevas páginas internas (listados, formularios):
  - Conserva el wrapper general (`admin-wrapper` + `admin-sidebar` + `admin-content`).
  - En el contenido, usa `admin-header` para título/subtítulo y reusa patrones de tarjetas o tablas según corresponda.

## Ejemplo mínimo para nuevas vistas del panel

```php
<?php include __DIR__ . '/../components/navbar.php'; ?>
<div class="admin-wrapper">
  <?php include __DIR__ . '/../components/admin_sidebar.php'; ?>
  <main class="admin-content">
    <div class="admin-header">
      <h1>Título de la vista</h1>
      <p>Descripción breve de la sección.</p>
    </div>
    <div class="admin-grid">
      <div class="admin-card">
        <h3>Módulo o dato</h3>
        <p>Descripción.</p>
        <a class="btn" href="#">Acción</a>
      </div>
    </div>
  </main>
  <!-- scripts opcionales del panel -->
</div>
```

## Diferencias con `assets/css/admin.css`

- `admin_panel.css` es la hoja usada por `admin.php` y define variables CSS y layout fijo (navbar + sidebar fijo) con clases `admin-wrapper`, `admin-content`, `admin-grid`, etc.
- `admin.css` contiene estilos para otras vistas administrativas (listados, formularios, tablas) y puede superponerse en nombres similares (`admin-grid`, `admin-card`). Evita cargar ambas a la vez en la misma vista salvo que verifiques que no haya conflictos de nombres.

## Extensión y mantenimiento

- Agrega nuevos módulos en el dashboard duplicando un bloque `.admin-card` dentro de `.admin-grid`.
- Para nuevas entradas del menú lateral, añade enlaces en `views/components/admin_sidebar.php` reutilizando `.admin-menu__subitem`.
- Si necesitas estados/variantes de botones, crea modificadores (p. ej. `.btn--outline`) manteniendo la paleta del `:root`.

## Dependencias

- Componentes: `views/components/navbar.php`, `views/components/admin_sidebar.php`.
- Iconografía: Font Awesome (cargada en la vista).
- Tipografía: Google Fonts Poppins.

