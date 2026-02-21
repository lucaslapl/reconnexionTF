<?php
require '_src/config.php';
require "_src/news_model.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta property="og:url" content="https://reconnexion.tf/">
    <meta property="og:title" content="reconnexion.tf - La Référence Communautaire pour TF2 en France">
    <meta property="og:description" content="reconnexion.tf c'est LA référence communautaire pour tous les joueurs et toutes les communautés sur Team Fortress 2 en France !">
    <meta property="og:image" content="https://reconnexion.tf/_img/og-reconnexiontf.webp">
	<meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="reconnexion.tf - La Référence Communautaire pour TF2 en France">
    <meta name="twitter:description" content="reconnexion.tf c'est LA référence communautaire pour tous les joueurs et toutes les communautés sur Team Fortress 2 en France !">
    <meta name="twitter:image" content="https://reconnexion.tf/_img/og-reconnexiontf.webp">

	<meta name="author" content="Lucas Laplanche - lucaslaplanche.fr">
	<meta name="description" content="reconnexion.tf c'est LA référence communautaire pour tous les joueurs et toutes les communautés sur Team Fortress 2 en France !">
	<meta name="keywords" content="reconnexion.tf, reconnexion, communauté, TF2, Team Fortress 2, France, français, serveurs, commu, commu fr, communautaire, plateforme, francophone">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="HOl6S97eZJt8AXy2Dfh4qqCY27b-7mPPABtnGjW6jk8" />

	<title>reconnexion.tf - À propos</title>

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
    <link rel="stylesheet" type="text/css" href="_css/a-propos.css">
    

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
    <?php include '_templates/header.php'; ?>
    <main id="a-propos">
        

        <section id="content">
            <h1>À propos de reconnexion.tf</h1>
            <div id="socials" class="flex">
                <a href="https://discord.gg/ShWmhQDb7H" title="Rejoindre le Discord">
                    <i class="fa-brands fa-discord fa-2x"></i>
                    <br>
                    <small>Discord</small>
                </a>
                <a href="" title="Groupe Steam">
                    <i class="fa-brands fa-steam fa-2x"></i>
                    <br>
                    <small>Groupe Steam</small>
                </a>
                <a href="https://twitter.com/reconnexion_tf" title="Rejoindre le Twitter">
                    <i class="fa-brands fa-twitter fa-2x"></i>
                    <br>
                    <small>@reconnexionTF</small>
                </a>
            </div>
            <img src="_img/favicon2.webp" alt="Logo reconnexion.tf">
            <p>
                <b>reconnexion.tf</b> est une plateforme communautaire lancée en mai 2025, dédiée à Team Fortress 2 pour la communauté francophone.<br>
                Son but est de s'instaurer comme le point de repère officiel pour tous les joueurs français et toutes les communautés francophones sur Team Fortress 2.<br>
                Ainsi, vous pourrez retrouver facilement toutes les informations et actualités concernant TF2 en France, ainsi que les serveurs de jeu francophones des communautés partenaires.
            </p>
            <p>
                Cette plateforme a également pour but de valoriser et mettre en lumière tous les créateurs de contenu, les organisateurs d'événements et les communautés qui le souhaitent.<br>
                C'est pour cette raison que nous avons mis en place un <a href="https://beta.reconnexion.tf/news/devenez-partenaire" title="Devenir Partenaire">Programme Partenaire</a> pour avoir la possibilité d'être mis en avant gratuitement sur nos réseaux et notre site web.
            </p>
            <p>
                Pour résumer, notre rôle n'est pas de rassembler les joueurs ou les communautés, mais d'agir comme un hub d'informations utiles pour tout le monde sur l'univers de Team Fortress 2.<br>
                Voyez cela comme un annuaire communautaire, un journal d'actualités et une vitrine pour les créateurs de contenu et les événements francophones liés à TF2.<br>
                Un peu comme les Pages Jaunes mais en mieux !
            </p>
            <p>
                Si le projet vous intéresse et que vous souhaitez nous soutenir, n'hésitez pas à rejoindre notre <a href="https://discord.gg/ShWmhQDb7H" title="Rejoindre le Discord">serveur Discord</a> ou à nous suivre sur <a href="https://twitter.com/reconnexion_tf" title="Rejoindre le Twitter">Twitter</a> pour rester informé des dernières nouveautés.<br>
                Nous avons aussi lancé une page Tipeee pour ceux qui souhaitent nous soutenir financièrement : <a href="https://fr.tipeee.com/reconnexiontf" title="Soutenir reconnexion.tf sur Tipeee">www.tipeee.com/reconnexion-tf</a>. Les dons nous aident à couvrir les coûts d'hébergement pour notre site et les serveurs de jeu.<br>
                Vous pouvez également nous aider en parlant de <b>reconnexion.tf</b> autour de vous et en partageant notre site web et nos réseaux sociaux avec vos amis et votre communauté !
            </p>
            <p>
                Enfin, si le coeur vous en dit et que vous avez des compétences bien particulières que vous souhaitez partager avec nous, n'hésitez pas à postuler pour rejoindre l'équipe via notre Discord !<br>
                Nous sommes toujours à la recherche de personnes motivées pour nous aider à faire grandir le projet, que ce soit en tant que rédacteur, développeur, designer, modérateur, ou toute autre compétence utile !
            </p>
        </section>
    </main>

    <?php require_once __DIR__ . '/_templates/footer.php'; ?>
    

    <script src="https://kit.fontawesome.com/2f306d349c.js" crossorigin="anonymous"></script>
</body>
</html>