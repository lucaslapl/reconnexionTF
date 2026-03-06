<?php

	$cache_file = __DIR__ . '/cache_servers.json';
	$cache_lifetime = 300; // en secondes (5 min)


	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	require __DIR__ . '/../sourcequery/SourceQuery/SourceQuery.php';

	use xPaw\SourceQuery\SourceQuery;

	$servers = [
		['name' => 'holiday', 'ip' => 'jeu.reconnexion.tf', 'port' => 27075], // RECONN TF
		['name' => 'vanilla',  'ip' => 'jeu.reconnexion.tf', 'port' => 27015],
		['name' => 'custom',     'ip' => 'jeu.reconnexion.tf', 'port' => 27035],
		['name' => 'mvm',  'ip' => 'jeu.reconnexion.tf', 'port' => 27055],
		['name' => 'tfdb',     'ip' => 'jeu.reconnexion.tf', 'port' => 27095],
		['name' => 'classified',     'ip' => 'jeu.reconnexion.tf', 'port' => 28015],
		['name' => 'casu-fff',     'ip' => 'funfortress.tf', 'port' => 27015],  // FFF
		['name' => 'jump-fff',     'ip' => 'funfortress.tf', 'port' => 27016],
		['name' => 'mge-fff',     'ip' => 'funfortress.tf', 'port' => 27017],
		['name' => 'tf2c-fff',     'ip' => 'funfortress.tf', 'port' => 27025]
	];

	$results = [];

	if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_lifetime) {
    header('Content-Type: application/json');
    echo file_get_contents($cache_file);
    exit;
}


	foreach ($servers as $srv) {
		$Query = new SourceQuery();
		try {
			$Query->Connect($srv['ip'], $srv['port'], 3, SourceQuery::SOURCE);
			$info = $Query->GetInfo();

			$results[$srv['name']] = [
				'ip' => $srv['ip'],
				'port' => $srv['port'],
				'hostname' => $info['HostName'] ?? null,
				'map' => $info['Map'] ?? null,
				'players' => $info['Players'] ?? null,
				'maxPlayers' => $info['MaxPlayers'] ?? null,
			];
		} catch (Exception $e) {
			$results[$srv['name']] = [
				'ip' => $srv['ip'],
				'port' => $srv['port'],
				'error' => $e->getMessage()
			];
		} finally {
			$Query->Disconnect();
		}

	usleep(300000); // pause entre requêtes
} 

header('Content-Type: application/json');
file_put_contents($cache_file, json_encode($results));
echo json_encode($results);