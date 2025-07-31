<?php

// Connexion à la DB
function dbConnect() {
    error_reporting(E_ALL);
    $env = parse_ini_file(__DIR__ . '/.env');

    // Détection locale ou prod
    $isLocal = in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']);

    if ($isLocal) {
        define("DB_DSN", $env['DB_LOCAL_DSN']);
        define("DB_USERNAME", $env['DB_LOCAL_USERNAME']);
        define("DB_PASSWORD", $env['DB_LOCAL_PASSWORD']);
    } else {
        define("DB_DSN", $env['DB_PROD_DSN']);
        define("DB_USERNAME", $env['DB_PROD_USERNAME']);
        define("DB_PASSWORD", $env['DB_PROD_PASSWORD']);
    }

    try {
        $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die("Échec lors de la connexion : " . $e->getMessage());
    }
}

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