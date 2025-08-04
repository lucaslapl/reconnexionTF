<?php

include("config.php");

///////////////////////////////////////////////
///////////////////////////////////////////////

// Récupération News paramétrable
function getNews($limit = null) {
    $db = dbConnect();
    $sql = "SELECT * FROM reconnexiontf_news ORDER BY id DESC";

    if ($limit !== null && is_int($limit)) {
        $sql .= " LIMIT :limit";
        $statement = $db->prepare($sql);
        $statement->bindValue(':limit', $limit, PDO::PARAM_INT);
    } else {
        $statement = $db->prepare($sql);
    }

    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Récupération d'un article entier (slug)
function getArticle($slug) {
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM reconnexiontf_news WHERE slug = ?");
    $statement->execute([$slug]);
    return $statement->fetch();
}


////////////////////////////////////////
////////////// ADMIN ///////////////////
////////////////////////////////////////

function adminAddNews($titre, $slug, $auteur, $contenu, $thumbnail_path, $news_type) {
    $db = dbConnect();
    $statement = $db->prepare("INSERT INTO reconnexiontf_news (titre, slug, auteur, contenu, thumbnail, news_type) VALUES (?, ?, ?, ?, ?, ?)");
    $statement->execute([$titre, $slug, $auteur, $contenu, $thumbnail_path, $news_type]);
}

function slugify($text) {
    // Remplace les caractères spéciaux
    $text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = strtolower(trim($text, '-'));
    $text = preg_replace('~[^-\w]+~', '', $text);
    return $text ?: 'article';
}

function processThumbnailUpload($inputName = 'thumbnail', $destination = '../news/_pics/') {
    if (!isset($_FILES[$inputName]) || $_FILES[$inputName]['error'] !== UPLOAD_ERR_OK) {
        return null; // Aucun fichier envoyé ou erreur
    }

    $ext = strtolower(pathinfo($_FILES[$inputName]['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($ext, $allowed)) {
        throw new Exception('Extension non autorisée.');
    }

    $validMimeTypes = [
        'jpg'  => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'png'  => 'image/png',
        'gif'  => 'image/gif',
        'webp' => 'image/webp'
    ];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($_FILES[$inputName]['tmp_name']);

    if (!isset($validMimeTypes[$ext]) || $mimeType !== $validMimeTypes[$ext]) {
        throw new Exception('Le type MIME ne correspond pas à l’extension.');
    }

    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $filename = uniqid('', true) . '.' . $ext;
    $uploadPath = rtrim($destination, '/') . '/' . $filename;

    if (!move_uploaded_file($_FILES[$inputName]['tmp_name'], $uploadPath)) {
        throw new Exception('Le déplacement du fichier a échoué.');
    }

    if (@getimagesize($uploadPath) === false) {
        unlink($uploadPath);
        throw new Exception('Le fichier n’est pas une image valide.');
    }

    return $uploadPath;
}

function adminDeleteNews() {
    $db = dbConnect();
    $id = (int)$_GET['id'];
    $statement = $db->prepare("DELETE FROM reconnexiontf_news WHERE id = ?");
    $statement->execute([$id]);
}

function adminEditNews($id) {
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM reconnexiontf_news WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetch();
}

function adminGetEditNews($id) {
    $db = dbConnect();
    $statement = $db->prepare("SELECT thumbnail, slug FROM reconnexiontf_news WHERE id = ?");
    $statement->execute([$id]);
    return $statement->fetch();
}

function adminEditNewsValid($titre, $auteur, $contenu, $thumbnail, $id) {
    $db = dbConnect();
    $statement = $db->prepare("UPDATE reconnexiontf_news SET titre = ?, auteur = ?, contenu = ?, thumbnail = ? WHERE id = ?");
    $statement->execute([$titre, $auteur, $contenu, $thumbnail, $id]);
}