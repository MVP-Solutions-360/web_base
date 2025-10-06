<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RepÃºblica Dominicana - Wilrop Colombia Travel</title>
    <meta name="description" content="Descubre RepÃºblica Dominicana con Wilrop Colombia Travel. Playas paradisÃ­acas, cultura vibrante y experiencias Ãºnicas en el Caribe.">
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <!-- Hero Section -->
    <section class="hero dominicana-hero">
        <!-- Carrusel de ImÃ¡genes -->
        <div class="hero-carousel" id="dominicanaCarousel">
            <!-- Las imÃ¡genes se cargarÃ¡n dinÃ¡micamente aquÃ­ -->
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
            <!-- Los indicadores se generarÃ¡n dinÃ¡micamente aquÃ­ -->
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h2>RepÃºblica Dominicana</h2>
                <p>Descubre la magia del Caribe con playas paradisÃ­acas, cultura vibrante y la hospitalidad dominicana que te conquistarÃ¡.</p>
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
                <p>Explora los lugares mÃ¡s hermosos de RepÃºblica Dominicana</p>
            </div>
            <div class="destinos-grid">
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/punta_cana/punta_cana3.png" alt="Punta Cana">
                    </div>
                    <div class="destino-content">
                        <h3>Punta Cana</h3>
                        <p>El destino de playa mÃ¡s famoso del paÃ­s, con resorts de lujo, playas de arena blanca y aguas cristalinas perfectas para el buceo y deportes acuÃ¡ticos.</p>
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
                        <p>La capital histÃ³rica, cuna de AmÃ©rica, donde se mezclan la historia colonial y la modernidad en una experiencia Ãºnica.</p>
                        <ul>
                            <li>Zona Colonial (UNESCO)</li>
                            <li>Museos histÃ³ricos</li>
                            <li>Vida nocturna vibrante</li>
                            <li>GastronomÃ­a local</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/puerto_plata.png" alt="Puerto Plata">
                    </div>
                    <div class="destino-content">
                        <h3>Puerto Plata</h3>
                        <p>Conocida como "La Novia del AtlÃ¡ntico", combina playas, montaÃ±as y una rica historia colonial en un ambiente relajado.</p>
                        <ul>
                            <li>TelefÃ©rico de Puerto Plata</li>
                            <li>Playa Dorada</li>
                            <li>Centro histÃ³rico</li>
                            <li>Ecoturismo</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/republica_dominicana/samana.png" alt="SamanÃ¡">
                    </div>
                    <div class="destino-content">
                        <h3>SamanÃ¡</h3>
                        <p>Un paraÃ­so natural donde puedes avistar ballenas jorobadas, disfrutar de cascadas espectaculares y playas vÃ­rgenes.</p>
                        <ul>
                            <li>Avistamiento de ballenas</li>
                            <li>Salto del LimÃ³n</li>
                            <li>Playa RincÃ³n</li>
                            <li>Ecoturismo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experiencias Ãšnicas -->
    <section id="experiencias" class="experiencias">
        <div class="container">
            <div class="section-header">
                <h2>Experiencias Ãšnicas</h2>
                <p>Vive momentos inolvidables en RepÃºblica Dominicana</p>
            </div>
            <div class="experiencias-grid">
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-water"></i>
                    </div>
                    <h3>Buceo y Snorkel</h3>
                    <p>Explora los arrecifes de coral mÃ¡s hermosos del Caribe y descubre la vida marina tropical en aguas cristalinas.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3>MÃºsica y Baile</h3>
                    <p>SumÃ©rgete en la cultura dominicana con clases de bachata y merengue, los ritmos que definen el paÃ­s.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <h3>GastronomÃ­a Local</h3>
                    <p>Saborea la autÃ©ntica comida dominicana: sancocho, mofongo, tostones y el famoso cafÃ© dominicano.</p>
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
                    <p>RepÃºblica Dominicana es un paÃ­s rico en cultura, donde se fusionan las tradiciones taÃ­nas, espaÃ±olas y africanas. La hospitalidad dominicana es legendaria, y cada regiÃ³n tiene sus propias tradiciones y festividades Ãºnicas.</p>
                    <div class="cultura-highlights">
                        <div class="highlight">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <h4>Festividades</h4>
                                <p>Carnaval, Festival de Merengue, y celebraciones religiosas Ãºnicas</p>
                            </div>
                        </div>
                        <div class="highlight">
                            <i class="fas fa-palette"></i>
                            <div>
                                <h4>Arte y ArtesanÃ­a</h4>
                                <p>Pintura naif, cerÃ¡mica taÃ­na, y artesanÃ­as en Ã¡mbar y larimar</p>
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

    <!-- InformaciÃ³n PrÃ¡ctica -->
    <section class="info-practica">
        <div class="container">
            <div class="section-header">
                <h2>InformaciÃ³n PrÃ¡ctica</h2>
                <p>Todo lo que necesitas saber para tu viaje</p>
            </div>
            <div class="info-grid">
                <div class="info-card">
                    <i class="fas fa-passport"></i>
                    <h3>DocumentaciÃ³n</h3>
                    <p>Pasaporte vÃ¡lido por 6 meses. No se requiere visa para estancias menores a 90 dÃ­as.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-dollar-sign"></i>
                    <h3>Moneda</h3>
                    <p>Peso Dominicano (DOP). Se acepta USD en la mayorÃ­a de establecimientos turÃ­sticos.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-language"></i>
                    <h3>Idioma</h3>
                    <p>EspaÃ±ol es el idioma oficial. InglÃ©s ampliamente hablado en zonas turÃ­sticas.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-thermometer-half"></i>
                    <h3>Clima</h3>
                    <p>Tropical todo el aÃ±o. Temperatura promedio: 25-30Â°C. Temporada de lluvias: mayo-noviembre.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-plane"></i>
                    <h3>Vuelos</h3>
                    <p>Vuelos directos desde Colombia a Santo Domingo y Punta Cana. DuraciÃ³n: 2-3 horas.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Seguridad</h3>
                    <p>PaÃ­s seguro para turistas. Se recomienda tomar precauciones bÃ¡sicas en zonas urbanas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Â¿Listo para descubrir RepÃºblica Dominicana?</h2>
                <p>ContÃ¡ctanos y planifica tu viaje perfecto al paraÃ­so caribeÃ±o</p>
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
            // Detectar quÃ© pÃ¡gina estamos cargando
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

