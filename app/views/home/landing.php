<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Asistencia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Los assets usan rutas absolutas con BASE_URL para que funcionen sin importar la URL actual -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/landing.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Fade overlay para transición de botón Ver demo -->
    <div id="fadeOverlay"></div>

    <!-- Menú móvil (overlay) fuera del nav para que position:fixed funcione siempre -->
    <?php include __DIR__ . '/../layouts/header-home.php'; ?>

    <!-- Sección principal con video de fondo -->
    <section class="stage">

        <video class="hero-video" autoplay muted loop playsinline>
            <source src="<?php echo BASE_URL; ?>/public/video/cual.mp4" type="video/mp4">
        </video>

        <!-- Navbar -->
        <nav class="navbar" id="navbar">
            <a class="brand" href="#">FERRETERIA</a>

            <button class="menu-btn" id="menuBtn" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>
        </nav>

        <!-- Contenido hero -->
        <div class="hero-content">
            <button class="cta-btn demo-trigger" id="verDemo">Ver demo</button>
        </div>

        <!-- Scroll indicator -->
        <div class="scroll-indicator" id="scrollIndicator">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>

    </section>

    <!-- Sección proyectos -->
    <section class="projects-section">

        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/image/herramienta.png" alt="Productos para tu construcción" class="project-img">
            </div>
            <h3 class="project-title">Productos para tu construcción</h3>
            <p class="project-desc">Encuentra herramientas, materiales y accesorios de alta calidad para cada proyecto, con acceso rápido y navegación intuitiva.</p>
            <a href="#" class="project-link">Ver demo <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="project-card">
            <div class="project-img-wrap">
                <img src="<?php echo BASE_URL; ?>/public/image/dashboard.png" alt="Sistema inteligente de ferretería  " class="project-img project-img--admin">
            </div>
            <h3 class="project-title">Sistema inteligente de ferretería</h3>
            <p class="project-desc">Controla inventario, ventas, compras y reportes en tiempo real desde un panel administrativo eficiente y seguro.</p>
            <a href="#" class="project-link">Ver demo <i class="bi bi-arrow-right"></i></a>
        </div>

    </section>

    <!-- Footer -->
    <?php include __DIR__ . '/../layouts/footer-home.php'; ?>
    <script src="<?php echo BASE_URL; ?>/public/js/landing.js"></script>
</body>

</html> 