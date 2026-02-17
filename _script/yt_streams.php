<?php
header('Content-Type: application/json');

$env = parse_ini_file(__DIR__ . '/.env');

// 🔐 Clé API YouTube (à placer dans un fichier séparé sécurisé si possible)
$apiKey = $env['YOUTUBE_API_KEY'];
$query = 'Team Fortress 2';
$maxResults = 10;
$categoryId = '20'; // Gaming

// 📦 Fichier de cache
$cacheFile = __DIR__ . '/yt_cache.json';
$cacheDuration = 300; // 5 minutes = 300 secondes

// ✅ Si le cache est récent, le renvoyer directement
if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheDuration)) {
    echo file_get_contents($cacheFile);
    exit;
}

// 🔍 Étape 1 : rechercher les lives
$searchUrl = 'https://www.googleapis.com/youtube/v3/search?' . http_build_query([
    'part' => 'snippet',
    'eventType' => 'live',
    'type' => 'video',
    'q' => $query,
    'maxResults' => $maxResults,
    'key' => $apiKey
]);

$searchResponse = file_get_contents($searchUrl);
$searchData = json_decode($searchResponse, true);

// 🔁 Vérification
if (!isset($searchData['items'])) {
    echo json_encode(['items' => []]);
    exit;
}

// 🎯 Étape 2 : récupérer les détails des vidéos (filtrage par catégorie)
$videoIds = array_column(array_column($searchData['items'], 'id'), 'videoId');

$videosUrl = 'https://www.googleapis.com/youtube/v3/videos?' . http_build_query([
    'part' => 'snippet,statistics,liveStreamingDetails',
    'id' => implode(',', $videoIds),
    'key' => $apiKey
]);

$videosResponse = file_get_contents($videosUrl);
$videosData = json_decode($videosResponse, true);

// 📤 Traitement et filtrage
$results = [];

$blacklist = [
    'UC0FV4-s5hxvBwZvmHlQkRUg',
    'UCJPNl4LTHYv0-EYS5sNcwXA'
];

foreach ($videosData['items'] as $item) {
    $channelId = $item['snippet']['channelId'];
    if ($item['snippet']['categoryId'] !== $categoryId) continue; // ne garde que les vidéos Gaming
    if (in_array($channelId, $blacklist)) {
        continue; // Ignore cette chaîne
    }

    $results[] = [
        'videoId' => $item['id'],
        'title' => $item['snippet']['title'],
        'channelTitle' => $item['snippet']['channelTitle'],
        'thumbnail' => $item['snippet']['thumbnails']['medium']['url'],
        'viewCount' => $item['liveStreamingDetails']['concurrentViewers'] ?? null
    ];
}

usort($results, function($a, $b) {
    return (int)($b['viewCount'] ?? 0) - (int)($a['viewCount'] ?? 0);
});

// 📄 Enregistrer le résultat dans le cache
$json = json_encode(['items' => $results], JSON_UNESCAPED_UNICODE);
file_put_contents($cacheFile, $json);

// ✅ Retourner les résultats au front
echo $json;