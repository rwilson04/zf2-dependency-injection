<?php
#module/Building/src/Building/Model/Building.php
namespace Building\Model;

class Building
{
	protected $_brickFactory;
	protected $_bricks;

	public function __construct($brickFactory)
	{
		$this->_brickFactory = $brickFactory;
	}

	public function getNewBrick($color=null)
	{
		$factory = $this->_brickFactory;
		$brick = $factory->__invoke($color);
		return $brick;
	}

	public function addLayer($color=null)
	{
		$layer = array();
		for ($i=1; $i<=6; $i++)
		{
			if ($color === null)
			{
				//constructed with the default color and then initialized
				$brick = $this->getNewBrick();
				$brick->setColor($brick->getRandomColor());
			}
			else
			{
				//constructed fully initialized with runtime 
				// parameter (usally preferred)
				$brick = $this->getNewBrick($color);
			}
			$layer[] = $brick;
		}
		$this->_bricks[]=$layer;
	}

	public function getBricks()
	{
		return $this->_bricks;
	}

}
