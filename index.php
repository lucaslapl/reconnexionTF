<?php
include("_inc/config.php");
include_once '_inc/sourcequery.php';
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
    
    <?php include '_inc/nav.php'; ?>

    <header id="accueil">
        <div class="main flex space-evenly">
            <div class="logo-title">
                <img src="_img/favicon2.webp" alt="Logo reconnexion.tf" fetchpriority="high">
                <h1>
                    reconnexion.tf
                </h1>
                <h2>
                    La plateforme communautaire au service de la francophonie sur Team Fortress 2
                </h2>
                <a href="https://discord.gg/ShWmhQDb7H" target="_blank" title="Rejoindre le Discord">
                    Rejoignez-nous maintenant !
                </a>
            </div>
            <div class="side-info">
                <div id="box-stream">
                    <h1>
                        <i class="fa-solid fa-circle" style="color: red;"></i> Streamers TF2
                    </h1>
                    <div id="streams">
                        <div class="tabs justify-center">
                          <button class="tab-button active" data-tab="all"><i class="fa-brands fa-twitch" style="color: #ca95ff;"></i></button>
                          <button class="tab-button" data-tab="fr"><i class="fa-brands fa-twitch" style="color: #ca95ff;"></i> FR</button>
                          <button class="tab-button" data-tab="yt"><i class="fa-brands fa-youtube" style="color: red;"></i></button>
                        </div>

                        <div id="streams-all" class="stream-tab active">
                          <img class="loading" src="_img/loading2.gif" alt="Chargement...">
                        </div>
                        
                        <div id="streams-fr" class="stream-tab">
                          <img class="loading" src="_img/loading2.gif" alt="Chargement...">
                        </div>
                        <div id="streams-yt" class="stream-tab">
                          <img class="loading" src="_img/loading2.gif" alt="Chargement...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        
       <section id="actualites" class="news_home">
            <div class="container">
                <h1>Actualités communautaires</h1>
            </div>
             <div class="news-list flex space-evenly">
            <?php 

                        $sthandler = $conn->prepare("SELECT * FROM reconnexiontf_news ORDER BY id DESC LIMIT 4");
                        $sthandler->execute();
                        $resultats = $sthandler->fetchAll();

                        // Affichage des résultats
                        foreach ($resultats as $row) {
                            $id = $row["id"];
                            $titre = $row["titre"];
                            $slug = $row["slug"];
                            $thumbnail = $row["thumbnail"];
                            $thumbnail_clean = str_replace('../', '', $thumbnail);
                            $date_publi = $row["date_publi"];
                            $news_type = $row["news_type"];

                    ?>
                <a id="news-nb<?= $id ?>" href="news/<?= $slug ?>">
                    <div class="news <?= $news_type ?>">
                        <span>Le <?= date('d/m/Y', strtotime($date_publi)) ?></span>
                        <p><?= $titre ?></p>
                        <img class="news-img" src="<?= $thumbnail_clean ?>" alt="thumbnail" loading="lazy">
                    </div>
                </a>
                <?php
            }
            ?>
            </div>
            <a href="/news/" title="Voir les actualités communautaires" class="news-all">
                Toutes les actualités
            </a>
        </section>
        <div class="header_background">
            <img src="_img/poster.webp" alt="">
        </div>
    </header>

    <section id="presentation">
        <div class="container">
            <h2>Le projet reconnexion.tf</h2>
        </div>
        <div class="container flex align-center space-evenly">
            <div class="text-pres">
                <h3>Les enjeux</h3>
                <p>La Communauté Française de Team Fortress 2 a souffert, ces dix dernières années, de la fermeture de ses derniers serveurs, et du déclin des dernières communautés actives du jeu.<br>
                Les Français sont alors dispersés dans un jeu où les parties en solo sont devenus la norme, et où les parties entre amis sont rendues difficiles à cause d'un système de Matchmaking inadapté.</p>
                <p><b>reconnexion.tf</b> veut pouvoir proposer une solution ambitieuse à tout cela, surtout à un moment où Team Fortress 2 connaît un regain d'intérêt et que des changements posifitfs sont à prévoir !</p>
                <h3>Les objectifs</h3>
                <ul>
                    <li>Le but de <b>reconnexion.tf</b> est d'aider la communauté française à retrouver un point de chute sur lequel les joueurs peuvent se rassembler et profiter de leur jeu favori entre amis !</li>
                    <li>Le but de <b>reconnexion.tf</b> est d'aider tous les joueurs francophones à s'intégrer dans une communauté qui est la leur dans une ambiance bienveillante et respectueuse.</li>
                    <li>Le but de <b>reconnexion.tf</b> est de s'instaurer comme le pilier de la Communauté Française de Team Fortress 2, alimentée par les joueurs francophones, pour les joueurs francophones.</li>
                    <li>Le but de <b>reconnexion.tf</b> est d'aider toutes les communautés à se développer et à accueillir les joueurs dans les meilleures conditions.</li>
                    <li>Le but de <b>reconnexion.tf</b> est de devenir une plateforme visant à mettre en avant les créateurs de contenus francophones et leur travail aux yeux de tous.</li>
                    <li>Le but de <b>reconnexion.tf</b> est de continuer à se développer avec ambition, et que notre plateforme devienne reconnue pour, qu'à terme, nous puissions entrer en partenariat avec d'autres communautés européennes, voire internationales lors de certains évènements (par exemple)</li>
                </ul>
            </div>
            <div class="img-pres">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/O8nTjYXaX8w?si=kpmuylLR0PmyaOkX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
        <div class="pres-bg">
        </div>
    </section>

    <section id="partners">
        <h1>Communautés partenaires</h1>
        <div class="container flex justify-center align-center">
            <a href="https://discord.com/invite/G6DEUQ4sBF">
                <div class="commu-box">
                    <img src="_img/funfortressfamily.gif" alt="Logo Fun Fortress Family">
                    <h3>Fun Fortress Family</h3>
                </div>
            </a>
        </div>
    </section>

    <section id="serveurs"> 
        <div class="container">
            <h2>Nos serveurs</h2>
        </div>
        <div class="container flex justify-center align-center">
            <div id="holiday-srv" class="server flex wrap-holiday">
                <div class="server-title flex align-center">
                    <i class="fa-solid fa-chevron-right fa-2x"></i>
                    <h3>Summer #1</h3>
                </div>
                <div class="server-connect flex align-center holiday">
                    <a class="link-holiday" href="#" onclick="return false;">
                        <img src="_img/favicon2.webp" alt="">
                        Bientôt !
                    </a>
                </div>
            </div>
            <div id="holiday-feat" class="server-features srv-holiday">
                    <ul>
                        <li>Notre serveur saisonnier, spécialement dédié pour la Summer Update !</li>
                        <li>Il contient toutes les maps communautaires sorties avec la Summer Update !</li>
                        <li>La rotation des maps se fait toutes les 30 minutes (sauf changement avec la commande <b>RTV</b>)</li>
                        <li>No random bullet spread</li>
                    </ul>
                </div>
            <div id="vanilla-srv" class="server flex wrap-vanilla">
                <div class="server-title flex align-center">
                    <i class="fa-solid fa-chevron-right fa-2x"></i>
                    <h3>Vanilla #1</h3>
                    <p><? echo $results[0]['players']; ?> / <? echo $results[0]['maxPlayers']; ?> - <? echo $results[0]['map']; ?></p>
                </div>
                <div class="server-connect flex align-center vanilla">
                    <a class="link-vanilla" href="steam://connect/152.53.183.126:27015">
                        <img src="_img/favicon2.webp" alt="">
                        Se connecter
                    </a>
                </div>
            </div>
            <div id="vanilla-feat" class="server-features srv-vanilla">
                    <ul>
                        <li>Ce serveur vous propose une sélection de maps officielles !</li>
                        <li>La rotation des maps se fait toutes les 45 minutes (sauf changement avec la commande <b>RTV</b>)</li>
                        <li>No random bullet spread</li>
                        <li>Des bots sont présents sur le serveur et disparaissent au fur et à mesure que d'autres joueurs rejoignent votre partie !</li>
                        <li>Ce serveur utilise le fonctionnement des anciens serveurs officiels de Valve pré-2016, avec tous les paramètres de l'ancien Quickplay !</li>
                    </ul>
                </div>
            <div id="custom-srv" class="server flex wrap-custom">
                <div class="server-title flex align-center">
                    <i class="fa-solid fa-chevron-right fa-2x"></i>
                    <h3>Custom #1</h3>
                    <p><? echo $results[1]['players']; ?> / <? echo $results[1]['maxPlayers']; ?> - <? echo $results[1]['map']; ?></p>
                </div>
                <div class="server-connect flex align-center custom">
                    <a class="link-custom" href="steam://connect/152.53.183.126:27025">
                        <img src="_img/favicon-orange-connect.png" alt="">
                        Se connecter
                    </a>                    
                </div>
            </div>
            <div id="custom-feat" class="server-features srv-custom">
                    <ul>
                        <li>Un serveur avec, pour l'instant, seulement cp_orange_x3</li>
                        <li>Nous souhaitons transformer ce serveur pour qu'il héberge plusieurs modes de jeu selon les maps choisies par les joueurs en cours de jeu !</li>
                        <li>No random bullet spread</li>
                        <li>Plugin RTD pour plus de piquant</li>
                    </ul>
                </div>
            <div id="mvm-srv" class="server flex wrap-custom">
                <div class="server-title flex align-center">
                    <i class="fa-solid fa-chevron-right fa-2x"></i>
                    <h3>MvM #1</h3>
                    <p><? echo $results[2]['players']; ?> / <? echo $results[2]['maxPlayers']; ?> - <? echo $results[2]['map']; ?></p>
                </div>
                <div class="server-connect flex align-center custom">
                    <a class="link-custom" href="steam://connect/152.53.183.126:27035">
                        <img src="_img/favicon-orange-connect.png" alt="">
                        Se connecter
                    </a>                    
                </div>
            </div>
            <div id="mvm-feat" class="server-features srv-custom">
                    <ul>
                        <li>Ce serveur utilise les maps officielles mais pourra héberger des maps communautaires à l'avenir !</li>
                        <li>No random bullet spread</li>
                        <li>Difficulté modulable !</li>
                    </ul>
                </div>
            <div id="tfdb-srv" class="server flex wrap-custom">
                <div class="server-title flex align-center">
                    <i class="fa-solid fa-chevron-right fa-2x"></i>
                    <h3>Dodgeball #1</h3>
                    <p><? echo $results[3]['players']; ?> / <? echo $results[3]['maxPlayers']; ?> - <? echo $results[3]['map']; ?></p>
                </div>
                <div class="server-connect flex align-center custom">
                    <a class="link-custom" href="steam://connect/152.53.183.126:27055">
                        <img src="_img/favicon-orange-connect.png" alt="">
                        Se connecter
                    </a>                    
                </div>
            </div>
            <div id="tfdb-feat" class="server-features srv-custom">
                    <ul>
                        <li>Plugin de stats en temps réel pour vous mesurer aux autres joueurs !</li>
                        <li>Plugin RTD (avec quelques effets inutiles supprimés)</li>
                        <li>Affrontez un bot si vous êtes tous seul sur le serveur pour vous entrainer !</li>
                    </ul>
                </div>
        </div>
        <div class="serveurs-bg">
            <div class="character">
                <img src="_img/Red_Engineer.webp" alt="">
            </div>
            <div class="bg"></div>
        </div>
    </section>

    <?php include '_inc/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2f306d349c.js" integrity="sha384-tV2bAJu/9vD0QXTOJWG5kJSnOg7VXobKXr8q75CXDyIrT+wB/vwkMb8ABdmknyUr" crossorigin="anonymous"></script>
    <!-- <script src="_js/jquery-3.3.1.min.js"></script> -->
	<script src="_js/main.js"></script>
    <script src="_js/streams.js" defer></script>
</body>
</html>