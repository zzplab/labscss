<?php
/**
 * Zzplab\LabScss\LabServer extends Leafo\ScssPhp\Server
 *
 * Setting output/cache file name using method serve(), example: $server->serve('app.min');
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 */
 
namespace Zzplab\LabScss;

require dirname(__DIR__) . '/leafo/scssphp/example/Server.php';

use Leafo\ScssPhp\Server;

class LabServer extends Server
{
	protected function cacheName($fname)
	{
		return strstr($fname, '/', true) . '.css';
	}
}
