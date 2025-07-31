<?php

$env = parse_ini_file(__DIR__ . '/.env');

// Récupération des infos
$client_id = $env['TWITCH_CLIENT_ID'];
$access_token = $env['TWITCH_ACCESS_TOKEN'];
$expires_at = isset($env['TWITCH_TOKEN_EXPIRES_AT']) ? (int)$env['TWITCH_TOKEN_EXPIRES_AT'] : 0;

// Vérifie si le token est expiré
if (time() >= $expires_at) {
    http_response_code(403);
    echo json_encode(['error' => 'Token Twitch expiré']);
    exit;
}

$game_name = 'Team Fortress 2';

// Étape 1 : Obtenir le game_id
$game_url = 'https://api.twitch.tv/helix/games?name=' . urlencode($game_name);
$headers = [
    'Client-ID: ' . $client_id,
    'Authorization: Bearer ' . $access_token
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $game_url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$game_response = curl_exec($ch);
curl_close($ch);

$game_data = json_decode($game_response, true);
$game_id = $game_data['data'][0]['id'] ?? null;

if ($game_id) {
    // Étape 2 : Obtenir les streams
    $streams_url = 'https://api.twitch.tv/helix/streams?game_id=' . $game_id;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $streams_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $streams_response = curl_exec($ch);
    curl_close($ch);

    $streams_data = json_decode($streams_response, true);

    foreach ($streams_data['data'] as $stream) {
        echo '<p><a href="https://twitch.tv/' . $stream['user_name'] . '">' . $stream['user_name'] . '</a> - ' . $stream['title'] . '</p>';
    }
} else {
    echo 'Jeu non trouvé.';
}
