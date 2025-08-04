<?php
require '../_src/config.php';
require '../_src/news_model.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
	<meta property="og:url" content="https://reconnexion.tf/">
    <meta property="og:title" content="reconnexion.tf - Articles Communautaires">
    <meta property="og:description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
    <meta property="og:image" content="https://reconnexion.tf/_img/favicon2.png">
	<meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="reconnexion.tf - Articles Communautaires">
    <meta name="twitter:description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
    <meta name="twitter:image" content="https://reconnexion.tf/_img/favicon2.png">

	<meta name="author" content="Lucas Laplanche - lucaslaplanche.fr">
	<meta name="description" content="reconnexion.tf est le point de repère officiel pour tous les joueurs et toutes les communautés sur Team Fortress 2.">
	<meta name="keywords" content="reconnexion.tf, reconnexion, communauté, TF2, Team Fortress 2, France, français, serveurs, commu, commu fr, communautaire, plateforme">
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

	<title>reconnexion.tf - Articles Communautaires</title>

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
    <link rel="manifest" href="../site.webmanifest">

	<link rel="stylesheet" type="text/css" href="../_css/main.css">
    <link rel="stylesheet" type="text/css" href="../_css/responsive.css">
    <link rel="stylesheet" type="text/css" href="_css/news.css">

    <!-- Cookie Manager (Tarteaucitron.io) -->
    <script src="../tarteaucitron/tarteaucitron.min.js"></script>
    <script src="../_js/tac_init.js"></script>

    <!-- Google tag (gtag.js) -->
    <script>
        tarteaucitron.user.gtagUa = 'G-N32XTRSJWY';
        tarteaucitron.user.gtagMore = function () {};
        (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
    </script>
</head>

<body>
    <?php include '../_templates/nav_sub.php'; ?>

    <section id="news">
        <div class="container">
            <h1>Actualités communautaires</h1>
        </div>
        <div class="news-list">
        <?php 

            $results = getNews();

            // Affichage des résultats
            foreach ($results as $row) {
                $id = $row["id"];
                $titre = $row["titre"];

                $extrait = strip_tags($row["contenu"]);
                $extrait = html_entity_decode($extrait);
                $extrait = mb_strimwidth($extrait, 0, 235, '...');
                $extrait = htmlspecialchars($extrait);

                $slug = $row["slug"];
                $thumbnail = $row["thumbnail"];
                $thumbnail_clean = str_replace('../news/', '', $thumbnail);
                $date_publi = $row["date_publi"];
                $news_type = $row["news_type"];

        ?>
        
        <div class="news <?= $news_type ?>_b flex align-center">
            <img class="news-img" src="<?= $thumbnail_clean ?>" alt="thumbnail">
            <div class="news-ctnt">
                <a id="news-nb<?= $id ?>" href="<?= $slug ?>">
                    <p><strong><?= $titre ?></strong></p>
                </a>
                <p class="news-tease"><?= $extrait ?></p>
                <span>Le <?= date('d/m/Y', strtotime($date_publi)) ?></span>
            </div>
        </div>
        <?php
            }
        ?>
        </div>
    </section>

    <?php include '../_templates/footer_sub.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2f306d349c.js" integrity="sha384-tV2bAJu/9vD0QXTOJWG5kJSnOg7VXobKXr8q75CXDyIrT+wB/vwkMb8ABdmknyUr" crossorigin="anonymous"></script>
    <!-- <script src="_js/jquery-3.3.1.min.js"></script> -->
	<script src="_js/news.js"></script>
</body>
</html>