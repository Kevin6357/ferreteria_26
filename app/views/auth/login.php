<!DOCTYPE html>
<html lang="es">

<head>
 <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/loader.css">
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo TITLE_BUSINESS; ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/login.css">

</head>
  <script src="<?php echo BASE_URL; ?>/public/js/loader.js"></script>   
<body>
<div id="page-loader">

    <section class="loader">
        <div><div><span class="one h6"></span><span class="two h3"></span></div></div>
        <div><div><span class="one h1"></span></div></div>
        <div><div><span class="two h2"></span></div></div>
        <div><div><span class="one h4"></span></div></div>
    </section>

</div>
    <!-- VIDEO FONDO -->
    <section class="stage">

        <video class="hero-video" autoplay muted loop playsinline>

            <source 
                src="<?php echo BASE_URL; ?>/public/video/login.mp4" 
                type="video/mp4"
            >

        </video>

    </section>

    <!-- MENSAJE ERROR -->
    <?php if(isset($error) && $error): ?>

        <p class="error-message">

            <?php echo htmlspecialchars($error); ?>

        </p>

    <?php endif; ?>

    <!-- LOGIN -->
    <div class="container">

        <div class="login-box">

            <form action="" method="POST" class="form">

                <div class="logo"></div>

                <span class="header">

                    Bienvenido

                </span>

                <!-- USUARIO -->
                <input 
                    type="text"
                    name="user"
                    placeholder="Usuario"
                    class="input"
                    required
                >

                <!-- PASSWORD -->
                <input 
                    type="password"
                    name="pass"
                    placeholder="Contraseña"
                    class="input"
                    required
                >

                <!-- BOTON -->
                <button type="submit" class="button sign-in">

                    Iniciar Sesión

                </button>

                <!-- LINKS -->
                <p class="footer">

                    ¿No tienes cuenta?

                    <a href="" class="link">

                        Regístrate

                    </a>

                    <br>

                    <a href="" class="link">

                        ¿Olvidaste tu contraseña?

                    </a>

                </p>

            </form>

        </div>

    </div>

</body>

</html>