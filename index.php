<?php
require '_src/config.php';
require "_src/news_model.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

	<!-- HTML Meta Tags -->
    <title>reconnexion.tf - Plateforme pour les Créateurs de Contenu TF2</title>
    <meta name="description" content="reconnexion.tf propose sa plateforme et ses services aux créateurs de contenu, communautés et initiatives ambitieuses francophones sur Team Fortress 2.">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://reconnexion.tf/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="reconnexion.tf - Plateforme pour les Créateurs de Contenu TF2">
    <meta property="og:description" content="reconnexion.tf propose sa plateforme et ses services aux créateurs de contenu, communautés et initiatives ambitieuses francophones sur Team Fortress 2.">
    <meta property="og:image" content="https://reconnexion.tf/_img/og-reconnexiontf.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="reconnexion.tf">
    <meta property="twitter:url" content="https://reconnexion.tf/">
    <meta name="twitter:title" content="reconnexion.tf - Plateforme pour les Créateurs de Contenu TF2">
    <meta name="twitter:description" content="reconnexion.tf propose sa plateforme et ses services aux créateurs de contenu, communautés et initiatives ambitieuses francophones sur Team Fortress 2.">
    <meta name="twitter:image" content="https://reconnexion.tf/_img/og-reconnexiontf.webp">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="HOl6S97eZJt8AXy2Dfh4qqCY27b-7mPPABtnGjW6jk8" />

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

    <link rel="preconnect" href="https://ka-f.fontawesome.com">


	<link rel="stylesheet" type="text/css" href="_css/main.css">
    <link rel="stylesheet" type="text/css" href="_css/responsive.css">

    <!-- Cookie Manager (Tarteaucitron.io) -->
    <script src="tarteaucitron/tarteaucitron.min.js"></script>
    <script src="_js/tac_init.js"></script>

    <!-- Google tag (gtag.js) -->
    <script>
        tarteaucitron.user.gtagUa = 'G-N32XTRSJWY';
        tarteaucitron.user.gtagMore = function () {};
        (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
    </script> 
</head>

<body>
    
    <?php require_once __DIR__ . '/_templates/header.php'; ?>
    
    <main id="main">

        <div id="content" class="flex">

            <?php //require_once __DIR__ . '/_templates/nav.php'; ?>

            <section id="left-content">

                <?php require_once __DIR__ . '/_templates/site_desc.php'; ?>
                    
                <?php require_once __DIR__ . '/_templates/actualites.php'; ?>

                <?php require_once __DIR__ . '/_templates/partners.php'; ?>

            </section>

            <section id="right-content">

                <?php require_once __DIR__ . '/_templates/streamlist.php'; ?>

                <?php require_once __DIR__ . '/_templates/side-links.php'; ?>
                
                <?php require_once __DIR__ . '/_templates/servers.php'; ?>
                
            </section>

        </div>

    </main>

    <?php require_once __DIR__ . '/_templates/footer.php'; ?>
    

    <script src="https://kit.fontawesome.com/2f306d349c.js" crossorigin="anonymous"></script>
    <script src="_js/streams.js" defer></script>
</body>
</html>