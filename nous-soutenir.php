<?php
require '_src/config.php';
require "_src/news_model.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<!-- HTML Meta Tags -->
    <title>reconnexion.tf - Nous soutenir</title>
    <meta name="description" content="reconnexion.tf propose sa plateforme et ses services aux créateurs de contenu, communautés et initiatives ambitieuses francophones sur Team Fortress 2.">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://reconnexion.tf/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="reconnexion.tf - Nous soutenir">
    <meta property="og:description" content="reconnexion.tf propose sa plateforme et ses services aux créateurs de contenu, communautés et initiatives ambitieuses francophones sur Team Fortress 2.">
    <meta property="og:image" content="https://reconnexion.tf/_img/og-reconnexiontf.webp">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="reconnexion.tf">
    <meta property="twitter:url" content="https://reconnexion.tf/">
    <meta name="twitter:title" content="reconnexion.tf - Nous soutenir">
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
    <link rel="stylesheet" type="text/css" href="_css/nous-soutenir.css">
    

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
    <?php include '_templates/header.php'; ?>

    <main id="nous-soutenir">
        <section id="content">
            <h1>Soutenir reconnexion.tf</h1>

            <div class="flex flex-reverse space-around">
                <div id="soutiens">
                    <h2>Nos bienfaiteurs</h2>
                    <h3>Tier 1 : Mécènes</h3>
                    <p class="befirst">Soyez le premier !</p>
                    <h3>Tier 2 : Ambassadeurs</h3>
                    <p class="befirst">Soyez le premier !</p>
                </div>
                <div id="soutenir">
                    <h2>Comment nous soutenir ?</h2>
                    <p>reconnexion.tf est une plateforme communautaire 100% gratuite, sans publicité, et qui ne génère aucun revenu. Son financement repose entièrement sur la générosité de ses utilisateurs et de ses partenaires. Pour en savoir plus sur nos objectifs et si vous souhaitez nous soutenir, vous pouvez le faire en cliquant sur l'encadré Tipeee ci-dessous :</p>
                    <a href="https://fr.tipeee.com/reconnexiontf" class="tipeee-goal-block" data-color="blue">Soutenez reconnexion.tf sur Tipeee</a>
                    <script async src="https://plugin.tipeee.com/widget.js" charset="utf-8"></script>
                </div>
            </div>
            
        </section>
    </main>

    <?php require_once __DIR__ . '/_templates/footer.php'; ?>
    

    <script src="https://kit.fontawesome.com/2f306d349c.js" crossorigin="anonymous"></script>
</body>
</html>