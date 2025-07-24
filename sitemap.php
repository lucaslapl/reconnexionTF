<?php
header("Content-Type: application/xml; charset=utf-8");

include_once("_inc/config.php");

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Page d’accueil -->
    <url>
        <loc>https://beta.reconnexion.tf/</loc>
        <lastmod>2025-06-24</lastmod>
        <priority>1.0</priority>
        <changefreq>always</changefreq>
    </url>

    <!-- Autres pages principales -->
    <url>
        <loc>https://reconnexion.tf/confidentialite.php</loc>
        <lastmod>2025-06-04</lastmod>
        <priority>0.4</priority>
        <changefreq>yearly</changefreq>
    </url>

    <!-- Articles -->
    <?php
    $stmt = $conn->query("SELECT slug, date_publi FROM reconnexiontf_news ORDER BY date_publi DESC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $url = "https://reconnexion.tf/news/" . htmlspecialchars($row['slug']);
        $lastmod = date('Y-m-d', strtotime($row['date_publi']));
        echo "<url>
            <loc>$url</loc>
            <lastmod>$lastmod</lastmod>
            <priority>0.8</priority>
            <changefreq>weekly</changefreq>
        </url>";
    }
    ?>
</urlset>
