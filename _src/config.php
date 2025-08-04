<?php
// Gestion de maintenance
// mettre true s'il y a une maintenance à effectuer, sinon laisser false

$maintenance = false;

if ($maintenance && $_SERVER["REMOTE_ADDR"] !== "81.65.117.129") {
    header('Location: maintenance.php');
    exit;
}




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