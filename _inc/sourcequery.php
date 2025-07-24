<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');

	require __DIR__ . '/../sourcequery/SourceQuery/SourceQuery.php';

	use xPaw\SourceQuery\SourceQuery;

	// Edit this ->
	$servers = [
		['ip' => '152.53.183.126', 'port' => 27015],
		['ip' => '152.53.183.126', 'port' => 27025],
		['ip' => '152.53.183.126', 'port' => 27035],
		['ip' => '152.53.183.126', 'port' => 27055]
		// Ajoute d'autres serveurs ici
	];
	// Edit this <-

	$results = [];

	foreach ($servers as $srv) {
		$Query = new SourceQuery();
		try {
			$Query->Connect($srv['ip'], $srv['port'], 3, SourceQuery::SOURCE);
			$info = $Query->GetInfo();
			$players = $Query->GetPlayers();

			$results[] = [
				'ip' => $srv['ip'],
				'port' => $srv['port'],
				'hostname' => $info['HostName'] ?? null,
				'map' => $info['Map'] ?? null,
				'players' => $info['Players'] ?? null,
				'maxPlayers' => $info['MaxPlayers'] ?? null,
				'playerList' => $players
			];
		} catch (Exception $e) {
			$results[] = [
				'ip' => $srv['ip'],
				'port' => $srv['port'],
				'error' => $e->getMessage()
			];
		} finally {
			$Query->Disconnect();
		}
	}
?>