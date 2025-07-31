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
                } //end foreach
            ?>
            </div>

            <a href="/news/" title="Voir les actualités communautaires" class="news-all">
                Toutes les actualités
            </a>
        </section>