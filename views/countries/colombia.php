<?php
// Puedes agregar lÃ³gica PHP aquÃ­ si lo necesitas en el futuro
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colombia - Wilrop Colombia Travel</title>
    <meta name="description" content="Descubre Colombia con Wilrop Colombia Travel. Diversidad cultural, paisajes Ãºnicos, cafÃ© de calidad mundial y la calidez de su gente.">
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <?php include __DIR__ . "/../components/navbar.php"; ?>

    <!-- Hero Section -->
    <section class="hero colombia-hero">
        <!-- Carrusel de ImÃ¡genes -->
        <div class="hero-carousel" id="colombiaCarousel">
            <!-- Las imÃ¡genes se cargarÃ¡n dinÃ¡micamente aquÃ­ -->
        </div>
        <!-- Controles del Carrusel -->
        <div class="carousel-controls">
            <button class="carousel-btn prev" onclick="changeSlideCol(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next" onclick="changeSlideCol(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <!-- Indicadores -->
        <div class="carousel-indicators" id="colombiaIndicators">
            <!-- Los indicadores se generarÃ¡n dinÃ¡micamente aquÃ­ -->
        </div>
        <div class="hero-content">
            <div class="hero-text">
                <h2>Colombia</h2>
                <p>Descubre la diversidad de Colombia: desde las montaÃ±as andinas hasta las playas del Caribe, pasando por la selva amazÃ³nica y ciudades coloniales llenas de historia.</p>
                <div class="hero-buttons">
                    <a href="#destinos" class="btn btn-primary">Explorar Destinos</a>
                    <a href="#antioquia" class="btn btn-secondary">Conocer Antioquia</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinos Principales -->
    <section id="destinos" class="destinos">
    <div class="container">
            <div class="section-header">
                <h2>Destinos Imperdibles</h2>
                <p>Explora la diversidad de Colombia</p>
            </div>
            <div class="destinos-grid">
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/colombia/bogota.png" alt="BogotÃ¡">
                    </div>
                    <div class="destino-content">
                        <h3>BogotÃ¡</h3>
                        <p>La capital del paÃ­s, una metrÃ³polis moderna que combina historia colonial, arte contemporÃ¡neo y una vibrante vida cultural.</p>
                        <ul>
                            <li>Centro HistÃ³rico La Candelaria</li>
                            <li>Museo del Oro</li>
                            <li>Monserrate</li>
                            <li>Zona Rosa</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/colombia/cartagena.png" alt="Cartagena">
                    </div>
                    <div class="destino-content">
                        <h3>Cartagena</h3>
                        <p>La joya del Caribe colombiano, con su arquitectura colonial, murallas histÃ³ricas y playas paradisÃ­acas.</p>
                        <ul>
                            <li>Ciudad Amurallada</li>
                            <li>Islas del Rosario</li>
                            <li>Playa Blanca</li>
                            <li>GastronomÃ­a local</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/colombia/antioquia/medellin.png" alt="MedellÃ­n">
                    </div>
                    <div class="destino-content">
                        <h3>MedellÃ­n</h3>
                        <p>La ciudad de la eterna primavera, innovadora y transformada, conocida por su clima perfecto y gente cÃ¡lida.</p>
                        <ul>
                            <li>Comuna 13</li>
                            <li>Museo de Antioquia</li>
                            <li>Metrocable</li>
                            <li>Feria de las Flores</li>
                        </ul>
                    </div>
                </div>
                <div class="destino-card">
                    <div class="destino-image">
                        <img src="/public/imagenes/destinos/colombia/cali.png" alt="Cali">
                    </div>
                    <div class="destino-content">
                        <h3>Cali</h3>
                        <p>La capital mundial de la salsa, donde la mÃºsica y el baile son parte de la vida cotidiana de sus habitantes.</p>
                        <ul>
                            <li>Feria de Cali</li>
                            <li>Escuelas de salsa</li>
                            <li>Centro histÃ³rico</li>
                            <li>Vida nocturna</li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <!-- SecciÃ³n Especial Antioquia -->
    <section id="antioquia" class="antioquia-section">
        <div class="container">
            <div class="section-header">
                <h2>Antioquia</h2>
                <p>El corazÃ³n de Colombia, donde la tradiciÃ³n paisa se encuentra con la modernidad</p>
            </div>

            <div class="antioquia-content">
                <h3>La Tierra Paisa</h3>
                <p>Antioquia es mucho mÃ¡s que MedellÃ­n. Es una regiÃ³n llena de pueblos coloniales, paisajes montaÃ±osos, fincas cafeteras y una cultura Ãºnica que define la identidad colombiana.</p>
            </div>
            <br>

            <div class="antioquia-destinos">
                <h3>Destinos AntioqueÃ±os</h3>
                <div class="antioquia-grid">
                    <div class="antioquia-card">
                        <div class="destino-image">
                            <img src="/public/imagenes/destinos/colombia/antioquia/guatape/guatape1.png" alt="JardÃ­n">
                        </div>
                        <div class="antioquia-card-content">
                            <h4>GuatapÃ©</h4>
                            <p>El pueblo mÃ¡s colorido de Colombia, famoso por su PeÃ±ol y sus casas con zÃ³calos pintados.</p>
                            <ul>
                                <li>La Piedra del PeÃ±ol</li>
                                <li>Embalse de GuatapÃ©</li>
                                <li>Arquitectura colorida</li>
                                <li>Deportes acuÃ¡ticos</li>
                            </ul>
                        </div>
                    </div>
                    <div class="antioquia-card">
                        <div class="destino-image">
                            <img src="/public/imagenes/destinos/colombia/antioquia/santa_fe.png" alt="JardÃ­n">
                        </div>
                        <div class="antioquia-card-content">
                            <h4>Santa Fe de Antioquia</h4>
                            <p>La primera capital de Antioquia, un pueblo colonial que parece detenido en el tiempo.</p>
                            <ul>
                                <li>Centro histÃ³rico colonial</li>
                                <li>Puente de Occidente</li>
                                <li>Iglesias centenarias</li>
                                <li>Clima cÃ¡lido</li>
                            </ul>
                        </div>
                    </div>
                    <div class="antioquia-card">
                        <div class="destino-image">
                            <img src="/public/imagenes/destinos/colombia/antioquia/jardin.png" alt="JardÃ­n">
                        </div>
                        <div class="antioquia-card-content">
                            <h4>JardÃ­n</h4>
                            <p>Un pueblo mÃ¡gico rodeado de montaÃ±as, conocido por su arquitectura colonial y su cafÃ© de calidad.</p>
                            <ul>
                                <li>Plaza principal</li>
                                <li>BasÃ­lica Menor</li>
                                <li>Fincas cafeteras</li>
                                <li>Ecoturismo</li>
                            </ul>
                        </div>
                    </div>
                    <div class="antioquia-card">
                        <div class="destino-image">
                            <img src="/public/imagenes/destinos/colombia/antioquia/jerico.png" alt="JardÃ­n">
                        </div>
                        <div class="antioquia-card-content">
                            <h4>JericÃ³</h4>
                            <p>El pueblo de la Madre Laura, un lugar de peregrinaciÃ³n y tradiciÃ³n religiosa en medio de montaÃ±as.</p>
                            <ul>
                                <li>BasÃ­lica de Nuestra SeÃ±ora</li>
                                <li>Museo de la Madre Laura</li>
                                <li>ArtesanÃ­as locales</li>
                                <li>Peregrinaciones</li>
                            </ul>
                        </div>
                    </div>
                    <div class="antioquia-card">
                        <div class="destino-image">
                            <img src="/public/imagenes/destinos/colombia/antioquia/doradal.png" alt="Doradal">
                        </div>
                        <div class="antioquia-card-content">
                            <h4>Doradal</h4>
                            <p>Un destino de aventura y naturaleza, conocido por sus paisajes y actividades al aire libre.</p>
                            <ul>
                                <li>Parque Natural ArvÃ­</li>
                                <li>Senderismo</li>
                                <li>Santorini AntioqueÃ±o</li>
                                <li>Peregrinaciones</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cultura-paisa">
                <h3>Cultura Paisa</h3>
                <div class="cultura-paisa-content">
                    <div class="antioquia-card-content">
                        <p>La cultura paisa es Ãºnica en Colombia. Conocida por su hospitalidad, emprendimiento y tradiciones, Antioquia ha dado al paÃ­s algunos de sus personajes mÃ¡s importantes y ha desarrollado una identidad cultural distintiva.</p>
                        <div class="cultura-highlights">
                            <div class="highlight">
                                <i class="fas fa-coffee"></i>
                                <div>
                                    <h4>CafÃ© de Calidad</h4>
                                    <p>El cafÃ© antioqueÃ±o es reconocido mundialmente por su sabor y calidad excepcional</p>
                                </div>
                            </div>
                            <div class="highlight">
                                <i class="fas fa-home"></i>
                                <div>
                                    <h4>Arquitectura Paisa</h4>
                                    <p>Casas con balcones, patios internos y una arquitectura que refleja la tradiciÃ³n familiar</p>
                                </div>
                            </div>
                            <div class="highlight">
                                <i class="fas fa-utensils"></i>
                                <div>
                                    <h4>GastronomÃ­a</h4>
                                    <p>Bandeja paisa, arepa antioqueÃ±a, mondongo y otros platos tradicionales Ãºnicos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experiencias Ãšnicas -->
    <section class="experiencias">
        <div class="container">
            <div class="section-header">
                <h2>Experiencias Ãšnicas en Colombia</h2>
                <p>Vive momentos inolvidables en el paÃ­s mÃ¡s acogedor del mundo</p>
            </div>
            <div class="experiencias-grid">
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <h3>Tour del CafÃ©</h3>
                    <p>Visita fincas cafeteras tradicionales y aprende sobre el proceso del cafÃ© desde la semilla hasta la taza.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <h3>Ecoturismo</h3>
                    <p>Explora parques nacionales, avista aves exÃ³ticas y descubre la biodiversidad Ãºnica de Colombia.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-music"></i>
                    </div>
                    <h3>MÃºsica y Danza</h3>
                    <p>SumÃ©rgete en la salsa, el vallenato, la cumbia y otros ritmos que definen la cultura colombiana.</p>
                </div>
                <div class="experiencia-card">
                    <div class="experiencia-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Esmeraldas y Oro</h3>
                    <p>Descubre la tradiciÃ³n minera de Colombia y aprende sobre las esmeraldas y el oro precolombino.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- InformaciÃ³n PrÃ¡ctica -->
    <section class="info-practica">
        <div class="container">
            <div class="section-header">
                <h2>InformaciÃ³n PrÃ¡ctica</h2>
                <p>Todo lo que necesitas saber para tu viaje a Colombia</p>
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
                    <p>Peso Colombiano (COP). Se acepta USD en algunos establecimientos turÃ­sticos.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-language"></i>
                    <h3>Idioma</h3>
                    <p>EspaÃ±ol es el idioma oficial. InglÃ©s hablado en zonas turÃ­sticas principales.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-thermometer-half"></i>
                    <h3>Clima</h3>
                    <p>Diverso segÃºn la regiÃ³n. Zona cafetera: 18-24Â°C. Caribe: 25-30Â°C. BogotÃ¡: 10-20Â°C.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-plane"></i>
                    <h3>Vuelos</h3>
                    <p>Vuelos directos desde RepÃºblica Dominicana a BogotÃ¡, MedellÃ­n y Cartagena.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Seguridad</h3>
                    <p>Colombia es un destino seguro para turistas. Se recomienda seguir las recomendaciones locales.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Promocional -->
    <div class="video-section" style="text-align:center; margin: 2rem 0;">
        <iframe width="560" height="315"
            src="https://www.youtube.com/embed/mn64ZdDpC6k"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
        </iframe>
    </div>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Â¿Listo para descubrir Colombia?</h2>
                <p>ContÃ¡ctanos y planifica tu aventura en el paÃ­s mÃ¡s acogedor del mundo</p>
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
</body>

</html>

