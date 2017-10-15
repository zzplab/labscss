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

require dirname(dirname(dirname(__DIR__))) . '/leafo/scssphp/example/Server.php';

use Leafo\ScssPhp\Server;

class LabServer extends Server
{
	protected $vCss = false;
	
	protected function cacheName($fname)
	{
		return strstr($fname, '/', true) . $this->getVersion() . '.min.css';
	}
	
	protected function getPathInfo()
	{
		$this->path_info = str_replace(['"',"'"],'',strip_tags(strtolower(ltrim($_SERVER['PATH_INFO'],'/'))));
	}
	
	protected function inputName()
	{
		$this->getPathInfo();
		if(strstr($this->path_info, '/'))
		{
			list($name, $version) = explode('/', $this->path_info);
			$this->vCss = $version;
		}
		else
		{
			$name = $this->path_info;
		}
		if(empty($name))
		{
			$name = 'app.scss';
		}
		elseif(!strstr($name, '.scss'))
		{
			$name = strtolower($name).'.scss';
		}
		return $name;
	}

	protected function getVersion()
	{
	  switch ($this->vCss) {
	    case '':
	      return '';
	    break;
	    default:
	      return '-'.$this->vCss;
	  }
	}
}
