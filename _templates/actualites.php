        <section id="actualites" class="news_home">
            <div class="container">
                <h1>Actualités communautaires <a href="/news/" title="Voir les actualités communautaires">(Voir tout)</a></h1>
            </div>
                <div class="news-list flex">
            <?php 

                $results = getNews(4);

                // Affichage des résultats
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
                } //end foreach
            ?>
            </div>
        </section>