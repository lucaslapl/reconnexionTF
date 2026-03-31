        <section id="actualites" class="news_home">
            <div class="container">
                <h1><i class="fa-solid fa-rss"></i>Actualités communautaires <a href="news/" title="Voir les actualités communautaires">(Voir tout)</a></h1>
            </div>
            <?php 
                $mainNews = getFirstNews();

                $titre = $mainNews["titre"];
                $contenu = $mainNews["contenu"];
                $thumbnail = str_replace('../', '', $mainNews["thumbnail"]);
                $slug = $mainNews["slug"];

                $contenu = preg_replace('/color\s*:\s*#[0-9a-fA-F]{3,6};?/', '', $contenu); // Supprime les styles de couleur imposées par TinyMCE
                $contenu_court = truncateHtml($contenu, 1000);
                ?>

                <div class="main-news">
                    <a href="news/<?= $slug ?>">
                        <img src="<?= $thumbnail ?>" alt="thumbnail">
                        <h2><?= $titre ?></h2>
                    </a>
                        <p style="color: #fff !important;">
                            <?= $contenu_court ?>
                            <a href="news/<?= $slug ?>" style="color: #fff; text-decoration: underline;">Lire la suite</a>
                        </p>
                </div>
                <div class="news-list flex">
            <?php 

                $results = getNews(3);

                foreach ($results as $row) {
                    $id = $row["id"];
                    $titre = $row["titre"];
                    $slug = $row["slug"];
                    $thumbnail = $row["thumbnail"];
                    $thumbnail_clean = str_replace('../', '', $thumbnail);
                    $date_publi = $row["date_publi"];
                    $news_type = $row["news_type"];
            ?>

                <a id="news-nb<?= $id ?>" href="news/<?= $slug ?>">
                    <div class="news flex space-between align-center <?= $news_type ?>">
                        <div class="flex align-center">
                            <img class="news-img" src="<?= $thumbnail_clean ?>" alt="thumbnail" loading="lazy">
                            <p class="titre-news"><?= $titre ?></p>
                        </div>
                        <p class="date-news"><?= date('d/m/Y', strtotime($date_publi)) ?></p>
                    </div>
                </a>

            <?php
                }
            ?>
            </div>
        </section>