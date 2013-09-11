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
		$brickModel = $this->getNewBrick();
		$layer = $brickModel->getLayer($color);
		$this->_bricks[]=$layer;
	}

	public function getBricks()
	{
		return $this->_bricks;
	}

}
