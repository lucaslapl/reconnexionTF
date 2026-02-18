<?php
header('Content-Type: application/json');

$env = parse_ini_file(__DIR__ . '/.env');

$apiKey = $env['YOUTUBE_API_KEY'];
$query = 'Team Fortress 2';
$maxResults = 10;
$categoryId = '20'; // Gaming

$cacheFile = __DIR__ . '/yt_cache.json';
$cacheDuration = 300; // 5 minutes = 300 secondes

if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheDuration)) {
    echo file_get_contents($cacheFile);
    exit;
}

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

if (!isset($searchData['items'])) {
    echo json_encode(['items' => []]);
    exit;
}

$videoIds = array_column(array_column($searchData['items'], 'id'), 'videoId');

$videosUrl = 'https://www.googleapis.com/youtube/v3/videos?' . http_build_query([
    'part' => 'snippet,statistics,liveStreamingDetails',
    'id' => implode(',', $videoIds),
    'key' => $apiKey
]);

$videosResponse = file_get_contents($videosUrl);
$videosData = json_decode($videosResponse, true);

$results = [];

// channel IDs à blacklist (pas le bon jeu, scam, etc.)
$blacklist = [
    'UC0FV4-s5hxvBwZvmHlQkRUg',
    'UCJPNl4LTHYv0-EYS5sNcwXA',
    'UCV6g5Taa6MgWAnW2aey9hXw'
];

foreach ($videosData['items'] as $item) {
    $channelId = $item['snippet']['channelId'];
    if ($item['snippet']['categoryId'] !== $categoryId) continue;
    if (in_array($channelId, $blacklist)) {
        continue;
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

$json = json_encode(['items' => $results], JSON_UNESCAPED_UNICODE);
file_put_contents($cacheFile, $json);

echo $json;