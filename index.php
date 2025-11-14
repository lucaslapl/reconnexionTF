<?php
require '_src/config.php';
require "_src/news_model.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta property="og:url" content="https://reconnexion.tf/">
    <meta property="og:title" content="reconnexion.tf - La Platforme Communautaire pour TF2 en France">
    <meta property="og:description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
    <meta property="og:image" content="https://reconnexion.tf/_img/favicon2.webp">
	<meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="reconnexion.tf - La Plateforme Communautaire pour TF2 en France">
    <meta name="twitter:description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
    <meta name="twitter:image" content="https://reconnexion.tf/_img/favicon2.webp">

	<meta name="author" content="Lucas Laplanche - lucaslaplanche.fr">
	<meta name="description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
	<meta name="keywords" content="reconnexion.tf, reconnexion, communauté, TF2, Team Fortress 2, France, français, serveurs, commu, commu fr, communautaire, plateforme">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="HOl6S97eZJt8AXy2Dfh4qqCY27b-7mPPABtnGjW6jk8" />

	<title>reconnexion.tf - La Plateforme Communautaire pour TF2 en France</title>

    <!-- Favicon standard -->
    <link rel="shortcut icon" href="https://reconnexion.tf/_img/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="https://reconnexion.tf/_img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://reconnexion.tf/_img/favicon-16x16.png">
    <link rel="icon" type="image/x-icon" href="https://reconnexion.tf/_img/favicon.ico">

    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" href="https://reconnexion.tf/_img/apple-touch-icon.png">

    <!-- Android Chrome -->
    <link rel="icon" type="image/png" sizes="192x192" href="https://reconnexion.tf/_img/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="https://reconnexion.tf/_img/android-chrome-512x512.png">

    <!-- Web App Manifest -->
    <link rel="manifest" href="/site.webmanifest">

    <link rel="preload" href="/_fonts/TF2Build.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/_fonts/TF2Secondary.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/_fonts/TF2.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/_fonts/TF2Professor.woff2" as="font" type="font/woff2" crossorigin>


	<link rel="stylesheet" type="text/css" href="_css/main.css">
    <link rel="stylesheet" type="text/css" href="_css/responsive.css">

    <!-- Cookie Manager (Tarteaucitron.io) 
    <script src="tarteaucitron/tarteaucitron.min.js"></script>
    <script src="_js/tac_init.js"></script>-->

    <!-- Google tag (gtag.js)
    <script>
        tarteaucitron.user.gtagUa = 'G-N32XTRSJWY';
        tarteaucitron.user.gtagMore = function () {};
        (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
    </script> -->
</head>

<body>
    
    <?php require_once __DIR__ . '/_templates/nav.php'; ?>

    <header id="accueil">
        
        <?php require_once __DIR__ . '/_templates/header.php'; ?>
        <!--
        <section id="beta-text" class="news_home">
            <div class="container">
                <h2>Notre plateforme se construit...</h2>
                <p>
                    <b>reconnexion.tf</b> est un projet d'envergure <i>en cours de développement</i>. Cela signifie que le contenu visible sur ce site, notre serveur Discord, ainsi que nos serveurs de jeu, est susceptible d'évoluer dans le temps.
                    <br>
                    Cette <a href="https://i.imgur.com/bXMr1cC.jpeg" target="_blank">roadmap</a> résume assez globalement nos objectifs et ambitions par rapport à notre projet.
                </p>
                <p>
                    Dans le cadre de ce projet, nous sommes à la recherche de volontaires motivés et ambitieux pour nous aider à construire une plateforme communautaire solide pour Team Fortress 2.
                    <br>
                    Si participer à un tel projet vous intéresse, n'hésitez pas à nous contacter directement sur Discord avec les liens mis à disposition sur cette page. Vous êtes les bienvenus !
                </p>
            </div>
        </section>
        -->
        <?php require_once __DIR__ . '/_templates/actualites.php'; ?>

        <div class="header_background">
            <img src="_img/poster.webp" alt="">
        </div>
    </header>

    <?php require_once __DIR__ . '/_templates/presentation.php'; ?>

    <?php require_once __DIR__ . '/_templates/partners.php'; ?>

    <?php require_once __DIR__ . '/_templates/servers.php'; ?>

    <?php require_once __DIR__ . '/_templates/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2f306d349c.js" integrity="sha384-UubVPeRg+bdh8vhqHOVDw9ith9KIv4UkAr/uXAPcetHpb6kcEZvvbQtuWEAmFFu6" crossorigin="anonymous"></script>
    <!-- <script src="_js/jquery-3.3.1.min.js"></script> -->
	<script src="_js/main.js"></script>
    <script src="_js/streams.js" defer></script>
</body>
</html>