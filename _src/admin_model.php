<?php 
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

function adminLogin() {
    $db = dbConnect();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM reconnexiontf_admins WHERE username = ?");
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            return "Identifiants incorrects";
        }
    }
}