<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>República Dominicana - Wilrop Colombia Travel</title>
    <meta name="description" content="Descubre República Dominicana con Wilrop Colombia Travel. Playas paradisíacas, cultura vibrante y experiencias únicas en el Caribe.">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <!-- Hero Section -->
    <section class="hero dominicana-hero">
        <!-- Carrusel de Imágenes -->
        <div class="hero-carousel" id="dominicanaCarousel">
            <!-- Las imágenes se cargarán dinámicamente aquí -->
        </div>
        <!-- Controles del Carrusel -->
        <div class="carousel-controls">
            <button class="carousel-btn prev" onclick="changeSlideDom(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next" onclick="changeSlideDom(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <!-- Indicadores -->
        <div class="carousel-indicators" id="dominicanaIndicators">
            <!-- Los indicadores se generarán dinámicamente aquí -->
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h2>República Dominicana</h2>
                <p>Descubre la magia del Caribe con playas paradisíacas, cultura vibrante y la hospitalidad dominicana que te conquistará.</p>
                <div class="hero-buttons">
                    <a href="#destinos" class="btn btn-primary">Explorar Destinos</a>
                    <a href="#experiencias" class="btn btn-secondary">Ver Experiencias</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinos Principales -->
    <section id="destinos" class="destinos">
        <div class="container">
            <div class="section-header">
                <h2>Destinos Imperdibles</h2>
                <p>Explora los lugares más hermosos de República Dominicana</p>
            </div>
            <div class="destinos-grid">
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/punta_cana/punta_cana3.png" alt="Punta Cana">
                    </div>
                    <div class="destino-content">
                        <h3>Punta Cana</h3>
                        <p>El destino de playa más famoso del país, con resorts de lujo, playas de arena blanca y aguas cristalinas perfectas para el buceo y deportes acuáticos.</p>
                        <ul>
                            <li>Playa Bavaro</li>
                            <li>Resorts todo incluido</li>
                            <li>Golf de clase mundial</li>
                            <li>Isla Saona</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/santo_domingo.png" alt="Santo Domingo">
                    </div>
                    <div class="destino-content">
                        <h3>Santo Domingo</h3>
                        <p>La capital histórica, cuna de América, donde se mezclan la historia colonial y la modernidad en una experiencia única.</p>
                        <ul>
                            <li>Zona Colonial (UNESCO)</li>
                            <li>Museos históricos</li>
                            <li>Vida nocturna vibrante</li>
                            <li>Gastronomía local</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/puerto_plata.png" alt="Puerto Plata">
                    </div>
                    <div class="destino-content">
                        <h3>Puerto Plata</h3>
                        <p>Conocida como "La Novia del Atlántico", combina playas, montañas y una rica historia colonial en un ambiente relajado.</p>
                        <ul>
                            <li>Teleférico de Puerto Plata</li>
                            <li>Playa Dorada</li>
                            <li>Centro histórico</li>
                            <li>Ecoturismo</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/samana.png" alt="Samaná">
                    </div>
                    <div class="destino-content">
                        <h3>Samaná</h3>
                        <p>Un paraíso natural donde puedes avistar ballenas jorobadas, disfrutar de cascadas espectaculares y playas vírgenes.</p>
                        <ul>
                            <li>Avistamiento de ballenas</li>
                            <li>Salto del Limón</li>
                            <li>Playa Rincón</li>
                            <li>Ecoturismo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experiencias Únicas -->
    <section id="experiencias" class="experiencias">
        <div class="container">
            <div class="section-header">
                <h2>Experiencias Únicas</h2>
                <p>Vive momentos inolvidables en República Dominicana</p>
            </div>
            <div class="experiencias-grid">
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3>Buceo y Snorkel</h3>
                    <p>Explora los arrecifes de coral más hermosos del Caribe y descubre la vida marina tropical en aguas cristalinas.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3>Música y Baile</h3>
                    <p>Sumérgete en la cultura dominicana con clases de bachata y merengue, los ritmos que definen el país.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>Gastronomía Local</h3>
                    <p>Saborea la auténtica comida dominicana: sancocho, mofongo, tostones y el famoso café dominicano.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Ecoturismo</h3>
                    <p>Descubre la naturaleza virgen en parques nacionales, cascadas escondidas y reservas de vida silvestre.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultura y Tradiciones -->
    <section class="cultura">
        <div class="container">
            <div class="cultura-content">
                <div class="cultura-text">
                    <h2>Cultura y Tradiciones</h2>
                    <p>República Dominicana es un país rico en cultura, donde se fusionan las tradiciones taínas, españolas y africanas. La hospitalidad dominicana es legendaria, y cada región tiene sus propias tradiciones y festividades únicas.</p>
                    <div class="cultura-highlights">
                        <div class="highlight">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <h4>Festividades</h4>
                                <p>Carnaval, Festival de Merengue, y celebraciones religiosas únicas</p>
                            </div>
                        </div>
                        <div class="highlight">
                            <i class="fas fa-palette"></i>
                            <div>
                                <h4>Arte y Artesanía</h4>
                                <p>Pintura naif, cerámica taína, y artesanías en ámbar y larimar</p>
                            </div>
                        </div>
                        <div class="highlight">
                            <i class="fas fa-church"></i>
                            <div>
                                <h4>Arquitectura Colonial</h4>
                                <p>La Zona Colonial de Santo Domingo, patrimonio de la humanidad</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cultura-image">
                    <div class="image-placeholder cultura-placeholder">
                        <i class="fas fa-music"></i>
                        <p>Cultura y tradiciones dominicanas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Información Práctica -->
    <section class="info-practica">
        <div class="container">
            <div class="section-header">
                <h2>Información Práctica</h2>
                <p>Todo lo que necesitas saber para tu viaje</p>
            </div>
            <div class="info-grid">
                <div class="info-card">
                    <i class="fas fa-passport"></i>
                    <h3>Documentación</h3>
                    <p>Pasaporte válido por 6 meses. No se requiere visa para estancias menores a 90 días.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Moneda</h3>
                    <p>Peso Dominicano (DOP). Se acepta USD en la mayoría de establecimientos turísticos.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-language"></i>
                    <h3>Idioma</h3>
                    <p>Español es el idioma oficial. Inglés ampliamente hablado en zonas turísticas.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-thermometer-half"></i>
                    <h3>Clima</h3>
                    <p>Tropical todo el año. Temperatura promedio: 25-30°C. Temporada de lluvias: mayo-noviembre.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-plane"></i>
                    <h3>Vuelos</h3>
                    <p>Vuelos directos desde Colombia a Santo Domingo y Punta Cana. Duración: 2-3 horas.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Seguridad</h3>
                    <p>País seguro para turistas. Se recomienda tomar precauciones básicas en zonas urbanas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>¿Listo para descubrir República Dominicana?</h2>
                <p>Contáctanos y planifica tu viaje perfecto al paraíso caribeño</p>
                <div class="cta-buttons">
                    <a href="../../index.php#contacto" class="btn btn-primary">Contactar Ahora</a>
                    <a href="../../products.html" class="btn btn-secondary">Ver Paquetes</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . "/../components/footer.php"; ?>

    <script src="/assets/js/scripts.js"></script>
    <script>
        const dominicanaImages = [
            '/imagenes/destinos/index/pareja_playa1.png',
            '/imagenes/destinos/index/pareja_playa2.png',
            '/imagenes/destinos/index/punta_cana1.png',
            '/imagenes/destinos/index/punta_cana2.png',
            '/imagenes/destinos/index/punta_cana3.png',
            '/imagenes/destinos/index/punta_cana4.png'
        ];

        document.addEventListener('DOMContentLoaded', function() {
            // Detectar qué página estamos cargando
            const currentPage = window.location.pathname.split('/').pop();
            // Permitir carrusel en index.php y index.html
            if (currentPage === 'dominicana.html') {
                initDominicanaCarousel();
            }
            // ...otros casos...
        });
    </script>
</body>

</html>