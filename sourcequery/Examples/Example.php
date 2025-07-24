<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require __DIR__ . '/../vendor/autoload.php';

use xPaw\SourceQuery\SourceQuery;

// For the sake of this example
header( 'Content-Type: text/plain' );
header( 'X-Content-Type-Options: nosniff' );

// Edit this ->
define( 'SQ_SERVER_ADDR', '152.53.183.126' );
define( 'SQ_SERVER_PORT', 27015 );
define( 'SQ_TIMEOUT',     1 );
define( 'SQ_ENGINE',      SourceQuery::SOURCE );
// Edit this <-

$Query = new SourceQuery( );

try
{
	$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

	print_r( $Query->GetInfo( ) );
	print_r( $Query->GetPlayers( ) );
	print_r( $Query->GetRules( ) );
}
catch( Exception $e )
{
	echo $e->getMessage( );
}
finally
{
	$Query->Disconnect( );
}
