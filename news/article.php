<?php
    require '../_src/config.php';
    require '../_src/news_model.php'; 
    
    $article = getArticle($_GET['slug'] ?? '');

    $description = strip_tags($article['contenu']);
    $description = mb_substr($description, 0, 150) . '...';

    $articleTitle = htmlspecialchars($article['titre'], ENT_QUOTES);
    $articleSlug = htmlspecialchars($article['slug'], ENT_QUOTES);

    if (!$article) {
        header("location: ../errors/404");
        //echo "Article non trouvé.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta property="og:title" content="reconnexion.tf - <?= htmlspecialchars($article['titre']) ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="https://reconnexion.tf/<?= str_replace('../', '', $article['thumbnail']) ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://reconnexion.tf/news/<?= htmlspecialchars($article['slug']) ?>">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="reconnexion.tf - <?= htmlspecialchars($article['titre']) ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="https://reconnexion.tf/<?= str_replace('../', '', $article['thumbnail']) ?>">


    <meta name="author" content="Lucas Laplanche - lucaslaplanche.fr">
	<meta name="description" content="reconnexion.tf c'est LA référence communautaire pour tous les joueurs et toutes les communautés sur Team Fortress 2 en France !">
	<meta name="keywords" content="reconnexion.tf, reconnexion, communauté, TF2, Team Fortress 2, France, français, serveurs, commu, commu fr, communautaire, plateforme, francophone">
    
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <title>reconnexion.tf - <?= htmlspecialchars($article['titre']) ?></title>

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

    <link rel="preconnect" href="https://ka-f.fontawesome.com">

    <link rel="stylesheet" type="text/css" href="../_css/main.css">
    <link rel="stylesheet" type="text/css" href="../_css/responsive.css">
    <link rel="stylesheet" type="text/css" href="_css/news.css">

    <!-- Cookie Manager (Tarteaucitron.io) 
    <script src="../tarteaucitron/tarteaucitron.min.js"></script>
    <script src="../_js/tac_init.js"></script>-->

    <!-- Google tag (gtag.js) 
    <script>
        tarteaucitron.user.gtagUa = 'G-N32XTRSJWY';
        tarteaucitron.user.gtagMore = function () { 
            gtag('event', 'view_article', {
                article_title: "<?= htmlspecialchars($article['titre'], ENT_QUOTES) ?>",
                article_slug: "<?= htmlspecialchars($article['slug'], ENT_QUOTES) ?>"
            });
            };
        (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
    </script>-->

    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "<?= htmlspecialchars($article['titre']) ?>",
        "image": [
            "https://reconnexion.tf/<?= str_replace('../', '', $article['thumbnail']) ?>"
        ],
        "datePublished": "<?= date('Y-m-d', strtotime($article['date_publi'])) ?>",
        "author": {
            "@type": "Person",
            "name": "<?= htmlspecialchars($article['auteur']) ?>"
        },
        "publisher": {
            "@type": "Organization",
            "name": "reconnexion.tf",
            "logo": {
                "@type": "ImageObject",
                "url": "https://reconnexion.tf/_img/android-chrome-192x192.png"
            }
        }
        }
    </script>
</head>

<body>
    <div id="news-article">
        <?php require_once '../_templates/header_sub.php'; ?>

        <section id="news-head">
            <div class="news-title">
                <h1><?= htmlspecialchars($article['titre']) ?></h1>
                <span>Par <?= htmlspecialchars($article['auteur']) ?>, le <?= date('d/m/Y', strtotime($article['date_publi'])) ?></span>
            </div>
        </section>

        <section id="news-content">
            <div class="article">
                <img src="<?= str_replace('../news/', '', $article['thumbnail']) ?>" alt="Thumbnail">
                <?= $article['contenu'] ?>
            </div>
        </section>
    </div>

    <?php require_once '../_templates/footer_sub.php'; ?>

    <script src="https://kit.fontawesome.com/2f306d349c.js" crossorigin="anonymous"></script>
</body>
</html>