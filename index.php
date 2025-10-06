<?php
session_start();
require_once __DIR__ . '/config/database.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilrop Colombia Travel - Turismo RepÃºblica Dominicana y Antioquia</title>
    <meta name="description" content="Wilrop Colombia Travel - Agencia especializada en turismo entre RepÃºblica Dominicana y Antioquia, Colombia. Descubre destinos Ãºnicos con nosotros.">
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <?php include __DIR__ . "/views/components/navbar.php"; ?>
    <!-- Hero Section -->
    <section id="inicio" class="hero">
        <!-- Carrusel de ImÃ¡genes -->
        <div class="hero-carousel" id="heroCarousel">
            <!-- Las imÃ¡genes se cargarÃ¡n dinÃ¡micamente aquÃ­ -->
        </div>
        
        <!-- Controles del Carrusel -->
        <div class="carousel-controls">
            <button class="carousel-btn prev" onclick="changeSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-btn next" onclick="changeSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <!-- Indicadores -->
        <div class="carousel-indicators" id="carouselIndicators">
            <!-- Los indicadores se generarÃ¡n dinÃ¡micamente aquÃ­ -->
        </div>
        
        <div class="hero-content">
            <div class="hero-text">
                <h2>Descubre la Magia del Caribe y los Andes</h2>
                <p>Conectamos RepÃºblica Dominicana con Colombia, ofreciendo experiencias turÃ­sticas Ãºnicas e inolvidables.</p>
                <div class="hero-buttons">
                    <a href="#destinos" class="btn btn-primary">Explorar Destinos</a>
                    <a href="#contacto" class="btn btn-secondary">Contactar</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Destinos Section -->
    <section id="destinos" class="destinos">
        <div class="container">
            <div class="section-header">
                <h2>Nuestros Destinos</h2>
                <p>Especialistas en turismo entre RepÃºblica Dominicana y Antioquia</p>
            </div>
            <div class="destinos-grid">
                <a href="views/countries/dominicana.php" class="destino-card" style="text-decoration:none; color:inherit;">
                    <div class="destino-image">
                        <img src="public/imagenes/destinos/republica_dominicana/punta_cana/punta_cana3.png" alt="Punta Cana">
                    </div>
                    <div class="destino-content">
                        <h3>RepÃºblica Dominicana</h3>
                        <p>Playas paradisÃ­acas, cultura vibrante y hospitalidad caribeÃ±a. Descubre la magia del Caribe con nosotros.</p>
                        <ul>
                            <li>Punta Cana</li>
                            <li>Santo Domingo</li>
                            <li>Puerto Plata</li>
                            <li>SamanÃ¡</li>
                        </ul>
                    </div>
                </a>
                <a href="views/countries/colombia.php" class="destino-card" style="text-decoration:none; color:inherit;">
                    <div class="destino-image">
                        <img src="public/imagenes/destinos/colombia/antioquia/medellin.png" alt="MedellÃ­n">
                    </div>
                    <div class="destino-content">
                        <h3>Colombia</h3>
                        <p>MontaÃ±as majestuosas, cafÃ© de calidad mundial y paisajes Ãºnicos. Vive la experiencia colombiana.</p>
                        <ul>
                            <li>MedellÃ­n</li>
                            <li>Santa Marta</li>
                            <li>Cartagena</li>
                            <li>San AndrÃ©s</li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Servicios Section -->
    <section id="servicios" class="servicios">
        <div class="container">
            <div class="section-header">
                <h2>Nuestros Servicios</h2>
                <p>Ofrecemos una experiencia completa de viaje</p>
            </div>
            <div class="servicios-grid">
                <div class="servicio-card">
                    <i class="fas fa-plane"></i>
                    <h3>Vuelos</h3>
                    <p>Reservas de vuelos entre RepÃºblica Dominicana y Colombia con las mejores aerolÃ­neas.</p>
                </div>
                <div class="servicio-card">
                    <i class="fas fa-bed"></i>
                    <h3>Hospedaje</h3>
                    <p>Hoteles y alojamientos seleccionados para garantizar tu comodidad y satisfacciÃ³n.</p>
                </div>
                <div class="servicio-card">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Tours</h3>
                    <p>Excursiones guiadas por los mejores destinos turÃ­sticos de ambos paÃ­ses.</p>
                </div>
                <div class="servicio-card">
                    <i class="fas fa-concierge-bell"></i>
                    <h3>Asistencia 24/7</h3>
                    <p>Soporte completo durante tu viaje para resolver cualquier inconveniente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto Section -->
    <section id="contacto" class="contacto">
        <div class="container">
            <div class="section-header">
                <h2>Contacto</h2>
                <p>Estamos aquÃ­ para ayudarte a planificar tu viaje perfecto</p>
                <p class="whatsapp-info">
                    <i class="fab fa-whatsapp"></i> 
                    Los mensajes se envÃ­an directamente a nuestro WhatsApp para una respuesta mÃ¡s rÃ¡pida
                </p>
            </div>
            <div class="contacto-content">
                <div class="contacto-form-wrapper">
                    <form id="contactForm" class="contact-form">
                        <div class="form-group">
                            <label for="nombre">Nombre Completo:</label>
                            <input type="text" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo ElectrÃ³nico:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">TelÃ©fono:</label>
                            <input type="tel" id="telefono" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="destinoInteres">Destino de InterÃ©s:</label>
                            <select id="destinoInteres" name="destinoInteres">
                                <option value="">Seleccionar destino</option>
                                <option value="republica-dominicana">RepÃºblica Dominicana</option>
                                <option value="antioquia">Antioquia, Colombia</option>
                                <option value="ambos">Ambos destinos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fab fa-whatsapp"></i> Enviar por WhatsApp
                        </button>
                    </form>
                </div>
                <div class="contacto-info-grid">
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>TelÃ©fono</h4>
                            <p>+1 (829) 794-9960</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <p>info@wilropcolombia.com</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>UbicaciÃ³n</h4>
                            <a href="https://maps.app.goo.gl/RAmgwxr4waLiwnqH7" target="_blank" class="map-link">MedellÃ­n, Colombia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . "/views/components/footer.php"; ?>

    <script src="assets/js/scripts.js"></script>
</body>
</html>

