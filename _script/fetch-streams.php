<?php

$env = parse_ini_file(__DIR__ . '/.env');

$language = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? 'fr' : 'all';
$cache_file = __DIR__ . "/cache_streams_$language.json";
$cache_lifetime = 300; // durée en secondes

if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    header('Content-Type: application/json');
    echo file_get_contents($cache_file);
    exit;
}

$client_id = $env['TWITCH_CLIENT_ID'];
$access_token = $env['TWITCH_ACCESS_TOKEN'];
$expires_at = isset($env['TWITCH_TOKEN_EXPIRES_AT']) ? (int)$env['TWITCH_TOKEN_EXPIRES_AT'] : 0;

if (time() >= $expires_at) {
    http_response_code(403);
    echo json_encode(['error' => 'Token expiré']);
    exit;
}

$language = isset($_GET['lang']) && $_GET['lang'] === 'fr' ? '&language=fr' : '';
$url = "https://api.twitch.tv/helix/streams?game_id=16676&first=15" . $language;

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