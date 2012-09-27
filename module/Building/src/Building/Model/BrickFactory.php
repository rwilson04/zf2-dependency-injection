<?php
namespace Building\Model;

use Zend\ServiceManager\AbstractPluginManager;

class BrickFactory extends AbstractPluginManager
{
	protected $brick;

	protected $shareByDefault = false;

	public function validatePlugin($plugin)
	{
		return true;
	}

	public function get($name, $options=array(), $usePeeringServiceManagers=true)
	{
		//$brick = parent::get($name, $options, $usePeeringServiceManagers);
		$brick = $this->getServiceLocator()->get('Brick');
		$brick->setColor($options['color']);
		return $brick;
	}

	#public function __construct(Brick $brick)
	#{
		#$this->brick = $brick;
	#}

	#public function createBrick($color)
	#{
		#$newBrick = clone($this->getBrick());
		#$newBrick->setColor($color);
		#return $newBrick;
	#}

	#public function setBrick(Brick $brick)
	#{
		#$this->brick = $brick;
	#}

	#private function getBrick()
	#{
		#return $this->brick;
	#}

}
