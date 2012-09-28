<?php
namespace Building\Model;

use Zend\ServiceManager\AbstractPluginManager;

class BrickFactory extends AbstractPluginManager
{
	public function validatePlugin($plugin)
	{
		if ($plugin instanceof Brick)  //change this to an interface if swapable
		{
			return;
		}
		throw new \DomainException('Invalid Brick Implementation');
	}

}
