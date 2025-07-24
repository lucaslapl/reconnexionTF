<?php
declare(strict_types=1);

/**
 * @author Pavel Djundik
 *
 * @link https://xpaw.me
 * @link https://github.com/xPaw/PHP-Source-Query
 *
 * @license GNU Lesser General Public License, version 2.1
 *
 * @internal
 */

namespace xPaw\SourceQuery;
require_once 'SourceQuery.php';
require_once 'SourceRcon.php';
require_once 'Socket.php';
require_once 'GoldSourceRcon.php';
require_once 'Buffer.php';
require_once 'BaseSocket.php';
require_once 'BaseRcon.php';

require_once 'Exception/SourceQueryException.php';
require_once 'Exception/SocketException.php';
require_once 'Exception/InvalidPacketException.php';
require_once 'Exception/InvalidArgumentException.php';
require_once 'Exception/AuthenticationException.php';
/**
 * Base RCON interface
 */
abstract class BaseRcon
{
	abstract public function Close( ) : void;
	abstract public function Open( ) : void;
	abstract public function Write( int $Header, string $String = '' ) : bool;
	abstract public function Read( ) : Buffer;
	abstract public function Command( string $Command ) : string;
	abstract public function Authorize( string $Password ) : void;
}
