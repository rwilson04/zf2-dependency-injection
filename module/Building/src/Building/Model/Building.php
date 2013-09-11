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
			$brick = $this->getNewBrick();
			if ($color === null)
			{
				$brick->setColor($brick->getRandomColor());
			}
			else
			{
				$brick->setColor($color);
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
