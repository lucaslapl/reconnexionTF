<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	require __DIR__ . '/../sourcequery/SourceQuery/SourceQuery.php';

	use xPaw\SourceQuery\SourceQuery;

	$servers = [
		['name' => 'holiday', 'ip' => '152.53.183.126', 'port' => 27045],
		['name' => 'vanilla',  'ip' => '152.53.183.126', 'port' => 27015],
		['name' => 'custom',     'ip' => '152.53.183.126', 'port' => 27025],
		['name' => 'mvm',  'ip' => '152.53.183.126', 'port' => 27035],
		['name' => 'tfdb',     'ip' => '152.53.183.126', 'port' => 27055],
	];

	$results = [];

	foreach ($servers as $srv) {
		$Query = new SourceQuery();
		try {
			$Query->Connect($srv['ip'], $srv['port'], 3, SourceQuery::SOURCE);
			$info = $Query->GetInfo();
			$players = $Query->GetPlayers();

			$results[$srv['name']] = [
				'ip' => $srv['ip'],
				'port' => $srv['port'],
				'hostname' => $info['HostName'] ?? null,
				'map' => $info['Map'] ?? null,
				'players' => $info['Players'] ?? null,
				'maxPlayers' => $info['MaxPlayers'] ?? null,
				'playerList' => $players
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


?>