<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$env = parse_ini_file(__DIR__ . '/.env');

// fichiers cache
$language = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? 'fr' : 'all';
$cache_file = __DIR__ . "/cache_streams_$language.json";
$cache_lifetime = 300;

$token_file = $env["TWITCH_ACCESS_TOKEN"];

function refreshTwitchToken($client_id, $client_secret, $token_file) {
    $url = "https://id.twitch.tv/oauth2/token";
    $data = [
        "client_id" => $client_id,
        "client_secret" => $client_secret,
        "grant_type" => "client_credentials"
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);

    if (isset($json["access_token"])) {
        $token_data = [
            "access_token" => $json["access_token"],
            "expires_at"   => time() + $json["expires_in"]
        ];
        file_put_contents($token_file, json_encode($token_data));
        return $token_data;
    } else {
        throw new Exception("Impossible de rafraîchir le token Twitch : " . $response);
    }
}

if (file_exists($token_file)) {
    $token_data = json_decode(file_get_contents($token_file), true);
} else {
    $token_data = ["access_token" => "", "expires_at" => 0];
}

if (time() >= $token_data["expires_at"]) {
    $token_data = refreshTwitchToken($env["TWITCH_CLIENT_ID"], $env["TWITCH_CLIENT_SECRET"], $token_file);
}

$access_token = $token_data["access_token"];
$client_id    = $env["TWITCH_CLIENT_ID"];

if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    header('Content-Type: application/json');
    echo file_get_contents($cache_file);
    exit;
}

$language_param = ($language === 'fr') ? "&language=fr" : "";
$url = "https://api.twitch.tv/helix/streams?game_id=16676&first=15" . $language_param;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Client-ID: $client_id",
    "Authorization: Bearer $access_token"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

file_put_contents($cache_file, $response);

header('Content-Type: application/json');
echo $response;
