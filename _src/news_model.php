<?php

include("config.php");

///////////////////////////////////////////////
///////////////////////////////////////////////

// Récupération News page accueil
function getNews() {
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM reconnexiontf_news ORDER BY id DESC LIMIT 4");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Récupération de toutes les news
function getAllNews() {
    $db = dbConnect();
    $statement = $db->prepare("SELECT * FROM reconnexiontf_news ORDER BY id DESC");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Récupération d'un article entier (slug)
function getArticle() {
    $db = dbConnect();
    $slug = $_GET['slug'] ?? '';
    $statement = $db->prepare("SELECT * FROM reconnexiontf_news WHERE slug = ?");
    $statement->execute([$slug]);
    return $statement->fetch();
}

////////////////////////////////////////
////////////////////////////////////////

function adminGetAllNews() {
    $db = dbConnect();
    $statement = $db->query("SELECT id, titre, auteur, slug, date_publi FROM reconnexiontf_news ORDER BY date_publi DESC");
    $statement->execute();
    return $statement->fetchAll();
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