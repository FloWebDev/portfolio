<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Développeur Web PHP Symfony JavaScript</title>
        <link rel="icon" type="image/x-icon" href="/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/assets/css/styles.min.css?v=<?php echo date('z') ?>" rel="stylesheet" />
        <!-- meta -->
        <meta name="description" content="Développeur Web PHP Symfony - JavaScript - Grenoble - Isère - Saint-Ismier">
        <meta name="keywords" content="développeur web, developpeur web, back-end, front-end, full-stack, fullstack, html, css, php, js, javascript, dev web, grenoble, rhône-alpes, rhone-alpes, rhône alpes, rhone alpes">
    </head>
    <body id="page-top">

        <?php require __DIR__ . '/' . $templateName . '.php'; ?>

        <!-- Pixel Art-->
        <div id="pixelArt"></div>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Florian Mathevon</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="/assets/img/florian-mathevon.webp" alt="florian-mathevon" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">A propos</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Expériences</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Diplômes</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Compétences</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Certifications</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>


        <footer class="text-center mb-2">
            Développé avec ❤️ et ☕ par FloWebDev - 2018-<?php echo date('Y'); ?><br>
            <?php echo number_format(LoggerService::getNumberOfVisitors(), 0, ',', ' '); ?> visiteurs
        </footer>

        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700&display=swap" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i&display=swap" rel="stylesheet" type="text/css" />
        <!-- Pixel Art CSS-->
        <link href="/assets/css/pixel_art.css?v=<?php echo date('z') ?>" rel="stylesheet" />
        <!-- lazysizes-->
        <script src="/assets/js/lazysizes.min.js" async></script>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous" defer></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" defer></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" defer></script>
        <!-- Core theme JS-->
        <script src="/assets/js/scripts.js?v=<?php echo date('z') ?>" defer></script>
        <script src="/assets/js/pixel_art.js?v=<?php echo date('z') ?>" defer></script>
        <?php if(!empty($contactJs)): ?>
            <script src="/assets/js/contact.js?v=<?php echo date('z') ?>" defer></script>
        <?php endif; ?>
    </body>
</html>
