<?php
namespace Building\Model;

#use Zend\ServiceManager\AbstractFactoryInterface;
#use Zend\ServiceManager\ServiceLocatorInterface;

class BrickFactory #implements AbstractFactoryInterface
{
	protected $brick;

	#public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
	#{
	#	#echo "can create serviceWithName? $name, requestedname: $requestedName <br />";
	#	if ($name === "abstractbrickfactory")
	#	{
	#		return true;
	#	}
	#	else
	#	{
	#		#echo "can't create serviceWithName $name <br />";
	#		return false;
	#	}
	#}

    #public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
	#{
	#	//echo "creating serviceWithName $name, requestedname: $requestedName <br />";
	#	$brickFactory = $serviceLocator->get('BrickFactory');
	#	$brick = $serviceLocator->get('Brick');
	#	$brickFactory->setBrick($brick);
	#	return $brickFactory;
	#	return function() { 
	#		return $brickFactory;
	#	};
	#}

	public function __construct(Brick $brick)
	#public function __construct()
	{
		$this->brick = $brick;
	}

	public function createBrick($color)
	{
		$newBrick = clone($this->getBrick());
		$newBrick->setColor($color);
		return $newBrick;
	}

	public function setBrick(Brick $brick)
	{
		$this->brick = $brick;
	}


	private function getBrick()
	{
		return $this->brick;
	}

}
