<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wilrop Colombia Travel - Sobre Nosotros</title>
    <meta name="description" content="Conoce la historia, misión, visión y valores de Wilrop Colombia Travel.">
    <link rel="icon" type="image/x-icon" href="/public/imagenes/logos/wilrop_vertical.ico">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <?php include __DIR__ . '/../components/navbar.php'; ?>

    <!-- Hero Section (sin carrusel) -->
    <section id="" class=" ">
        <div class="hero-content">
            <div class="">
                <h2>Somos Wilrop Colombia Travel</h2>
                <p>Unimos República Dominicana y Colombia con experiencias diseñadas para viajeros que buscan memorias inolvidables.</p>
                <div class="hero-buttons">
                    <a href="#nosotros" class="btn btn-primary">Conócenos</a>
                    <a href="#contacto" class="btn btn-secondary btn-outline">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Nosotros Section -->
    <section id="nosotros" class="destinos">
        <div class="container">
            <div class="section-header">
                <h2>Nosotros</h2>
                <p>Construimos puentes turísticos que celebran la diversidad entre el Caribe y los Andes.</p>
            </div>
            <div class="destinos-grid single-column">
                <article class="destino-card">
                    <div class="destino-content">
                        <h3>Misión</h3>
                        <p>Brindar experiencias de viaje auténticas y memorables al conectar República Dominicana y Colombia, destacando la riqueza cultural y la diversidad de ambos destinos. Nos comprometemos a ofrecer un servicio personalizado, con calidez y profesionalismo, para que nuestros clientes vivan momentos únicos y enriquecedores, fomentando el intercambio cultural y el descubrimiento de nuevas experiencias.</p>
                    </div>
                </article>
                <article class="destino-card">
                    <div class="destino-content">
                        <h3>Visión</h3>
                        <p>Convertirse en la agencia líder en la conexión turística entre República Dominicana y Colombia, reconocida por su innovación, excelencia y compromiso con la autenticidad. Aspiramos a ser un referente en la promoción de experiencias únicas, destacando la diversidad cultural y natural de ambos destinos. En el futuro, buscamos expandir nuestra presencia, impulsar el turismo responsable y crear puentes culturales duraderos entre ambas naciones.</p>
                    </div>
                </article>
                <article class="destino-card">
                    <div class="destino-content">
                        <h3>Valores</h3>
                        <ul>
                            <li>Autenticidad.</li>
                            <li>Hospitalidad y Calidez.</li>
                            <li>Compromiso con la Excelencia.</li>
                            <li>Pasión por los Destinos.</li>
                            <li>Responsabilidad y Transparencia.</li>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
        <div class="container">
            <div class="section-header-2 mt-4">
                <h2>Nuestros arquetipos</h2>
                <p>Los arquetipos que nos representan definen nuestra esencia: combinamos la sabiduría y el profesionalismo de una agencia confiable con el espíritu aventurero de quienes exploran y conectan culturas. Así nace nuestra identidad: un puente entre República Dominicana y Colombia, auténtico, humano y transformador.</p>
            </div>
            <div class="destinos-grid single-column">
                <article class="destino-card">
                    <div class="destino-content">
                        <h3>🧠 El Sabio</h3>
                        <p>Wilrop Colombia Travel transmite conocimiento, experiencia y confianza. Nos posicionamos como una agencia experta que orienta a cada viajero con información clara, asesoría profesional y soluciones bien estructuradas. Como el arquetipo del Sabio, inspiramos seguridad y credibilidad en cada recomendación, asegurando que nuestros clientes tomen decisiones informadas para disfrutar al máximo sus viajes.</p>
                    </div>
                </article>
                <article class="destino-card">
                    <div class="destino-content">
                        <h3>🌍 El Explorador</h3>
                        <p>Somos impulsores de experiencias auténticas y memorables. Como Exploradores, nos apasiona descubrir y conectar culturas, revelando la verdadera esencia de República Dominicana y Colombia más allá de lo convencional. Invitamos a nuestros viajeros a vivir la aventura, a expandir sus horizontes y a sumergirse en destinos que transforman y enriquecen.</p>
                    </div>
                </article>
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
                    <p>Reservas de vuelos entre República Dominicana y Colombia con las mejores aerolíneas.</p>
                </div>
                <div class="servicio-card">
                    <i class="fas fa-bed"></i>
                    <h3>Hospedaje</h3>
                    <p>Hoteles y alojamientos seleccionados para garantizar tu comodidad y satisfacción.</p>
                </div>
                <div class="servicio-card">
                    <i class="fas fa-map-marked-alt"></i>
                    <h3>Tours</h3>
                    <p>Excursiones guiadas por los mejores destinos turísticos de ambos países.</p>
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
                <p>Estamos aquí para ayudarte a planificar tu viaje perfecto</p>
                <p class="whatsapp-info">
                    <i class="fab fa-whatsapp"></i>
                    Los mensajes se envían directamente a nuestro WhatsApp para una respuesta más rápida
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
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono">
                        </div>
                        <div class="form-group">
                            <label for="destinoInteres">Destino de Interés:</label>
                            <select id="destinoInteres" name="destinoInteres">
                                <option value="">Seleccionar destino</option>
                                <option value="republica-dominicana">República Dominicana</option>
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
                            <h4>Teléfono</h4>
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
                            <h4>Ubicación</h4>
                            <a href="https://maps.app.goo.gl/RAmgwxr4waLiwnqH7" target="_blank" class="map-link">Medellín, Colombia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/../components/footer.php'; ?>

    <script src="/assets/js/scripts.js"></script>
</body>

</html>
