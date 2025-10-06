# Documentación de Carrusel para Reutilización en Otros Proyectos

Este documento explica cómo implementar el carrusel de imágenes utilizado en el proyecto Wilrop, incluyendo los estilos CSS y las funciones JavaScript necesarias para replicar su apariencia y comportamiento en cualquier otro proyecto web.

---

## 1. Estructura HTML Requerida

```html
<!-- Carrusel principal -->
<div id="dominicanaCarousel" class="hero-carousel"></div>
<!-- Indicadores -->
<div id="dominicanaIndicators" class="carousel-indicators"></div>
<!-- Controles (opcional, si se agregan manualmente) -->
<div class="carousel-controls">
  <button class="carousel-btn" onclick="changeSlideDom(-1)">&#10094;</button>
  <button class="carousel-btn" onclick="changeSlideDom(1)">&#10095;</button>
</div>
```

> **Nota:** El carrusel y los indicadores se generan dinámicamente por JavaScript. Los controles pueden agregarse manualmente o por JS.

---

## 2. Estilos CSS

Agrega los siguientes estilos a tu archivo CSS para obtener la apariencia exacta del carrusel:

```css
.hero-carousel {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 1;
}

.carousel-slide {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}
.carousel-slide.active {
    opacity: 1;
}

.carousel-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(44, 90, 160, 0.7) 0%, rgba(52, 152, 219, 0.5) 100%);
    z-index: 2;
}

.carousel-controls {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 2rem;
    z-index: 10;
}
.carousel-btn {
    background: rgba(255,255,255,0.2);
    border: 2px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    width: 50px; height: 50px;
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 1.2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}
.carousel-btn:hover {
    background: rgba(255,255,255,0.3);
    border-color: rgba(255,255,255,0.5);
    transform: scale(1.1);
}

.carousel-indicators {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 1rem;
    z-index: 10;
}
.indicator {
    width: 12px; height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.4);
    cursor: pointer;
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.6);
}
.indicator.active,
.indicator:hover {
    background: white;
    transform: scale(1.2);
}
```

---

## 3. Funciones JavaScript

Agrega el siguiente bloque JS para crear y controlar el carrusel dinámicamente:

```javascript
// Lista de imágenes
const dominicanaImages = [
    'imagenes/destinos/republica_dominicana/punta_cana/pareja_playa1.png',
    'imagenes/destinos/republica_dominicana/punta_cana/pareja_playa2.png',
    'imagenes/destinos/republica_dominicana/punta_cana/punta_cana1.png',
    'imagenes/destinos/republica_dominicana/punta_cana/punta_cana2.png',
    'imagenes/destinos/republica_dominicana/punta_cana/punta_cana3.png',
    'imagenes/destinos/republica_dominicana/punta_cana/punta_cana4.png'
];

let currentDomSlideIndex = 0;
let domSlides = [];
let domIndicators = [];
let domSlideInterval;

function createDominicanaCarouselSlides() {
    const carousel = document.getElementById('dominicanaCarousel');
    const indicatorsContainer = document.getElementById('dominicanaIndicators');
    if (!carousel || !indicatorsContainer) return;
    carousel.innerHTML = '';
    indicatorsContainer.innerHTML = '';
    dominicanaImages.forEach((imagePath, index) => {
        const slide = document.createElement('div');
        slide.className = `carousel-slide ${index === 0 ? 'active' : ''}`;
        slide.style.backgroundImage = `url('${imagePath}')`;
        const overlay = document.createElement('div');
        overlay.className = 'carousel-overlay';
        slide.appendChild(overlay);
        carousel.appendChild(slide);
        const indicator = document.createElement('span');
        indicator.className = `indicator ${index === 0 ? 'active' : ''}`;
        indicator.onclick = () => currentSlideDom(index + 1);
        indicatorsContainer.appendChild(indicator);
    });
    domSlides = document.querySelectorAll('#dominicanaCarousel .carousel-slide');
    domIndicators = document.querySelectorAll('#dominicanaIndicators .indicator');
}

function initDominicanaCarousel() {
    createDominicanaCarouselSlides();
    if (domSlides.length === 0) return;
    showSlideDom(0);
    startAutoSlideDom();
    const carousel = document.querySelector('#dominicanaCarousel');
    if (carousel) {
        carousel.addEventListener('mouseenter', stopAutoSlideDom);
        carousel.addEventListener('mouseleave', startAutoSlideDom);
    }
}

function showSlideDom(index) {
    domSlides.forEach(slide => slide.classList.remove('active'));
    domIndicators.forEach(indicator => indicator.classList.remove('active'));
    if (domSlides[index]) domSlides[index].classList.add('active');
    if (domIndicators[index]) domIndicators[index].classList.add('active');
}

function changeSlideDom(direction) {
    currentDomSlideIndex += direction;
    if (currentDomSlideIndex >= domSlides.length) currentDomSlideIndex = 0;
    else if (currentDomSlideIndex < 0) currentDomSlideIndex = domSlides.length - 1;
    showSlideDom(currentDomSlideIndex);
}

function currentSlideDom(slideNumber) {
    currentDomSlideIndex = slideNumber - 1;
    showSlideDom(currentDomSlideIndex);
}

function startAutoSlideDom() {
    domSlideInterval = setInterval(() => {
        changeSlideDom(1);
    }, 5000);
}
function stopAutoSlideDom() {
    clearInterval(domSlideInterval);
}

// Inicializa el carrusel al cargar la página
window.addEventListener('DOMContentLoaded', initDominicanaCarousel);
```

---

## 4. Personalización
- Cambia el array de imágenes por las rutas que desees mostrar.
- Puedes duplicar la lógica para otros destinos cambiando los IDs y el array de imágenes.
- Los estilos pueden ajustarse para diferentes tamaños, colores o efectos.

---

## 5. Recomendaciones
- Mantén la estructura de IDs en el HTML para que el JS funcione correctamente.
- Los estilos deben estar en el mismo archivo CSS o importados en el HTML.
- El JS debe cargarse después de los elementos HTML del carrusel.

---

## 6. Ejemplo Visual

![Ejemplo de Carrusel](imagenes/destinos/republica_dominicana/punta_cana/punta_cana1.png)

---

**Con este documento puedes replicar el carrusel en cualquier proyecto web, manteniendo la misma apariencia y funcionalidad.**
