<?php
namespace Building\Model;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\View\Model\ViewModel;

class ViewFactory extends AbstractPluginManager
{
	public function validatePlugin($plugin)
	{
		if ($plugin instanceof ViewModel) 
		{
			return;
		}
		throw new \DomainException('Invalid ViewModel Implementation');
	}

}
