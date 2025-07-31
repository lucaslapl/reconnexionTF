<?php

$env = parse_ini_file(__DIR__ . '/.env');

$client_id = $env['TWITCH_CLIENT_ID'];
$client_secret = $env['TWITCH_CLIENT_SECRET'];

$tokenFile = __DIR__ . '/.twitch_token.json';

// If cache token still valid
if (file_exists($tokenFile)) {
    $tokenData = json_decode(file_get_contents($tokenFile), true);
    if ($tokenData && isset($tokenData['expires_at']) && $tokenData['expires_at'] > time()) {
        header('Content-Type: application/json');
        echo json_encode($tokenData);
        exit;
    }
}

// Else, ask a new one
$url = 'https://id.twitch.tv/oauth2/token';
$params = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'client_credentials'
];

// Requête POST
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur de connexion à Twitch']);
} else {
    $data = json_decode($response, true);

    if (isset($data['access_token'])) {
        // Ajoute une expiration timestamp au cache
        $data['expires_at'] = time() + $data['expires_in'] - 60; // marge de 60 sec
        file_put_contents($tokenFile, json_encode($data));
        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erreur lors de la récupération du token Twitch']);
    }
}

curl_close($ch);
?>

