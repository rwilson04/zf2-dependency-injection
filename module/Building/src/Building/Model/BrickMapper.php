<?php
#module/Building/src/Building/Model/BrickMapper.php
namespace Building\Model;

class BrickMapper
{
	protected $_modelFactory;

	public function __construct($modelFactory)
	{
		$this->_modelFactory = $modelFactory;
	}

	public function getNewModel($color=null)
	{
		return $this->_modelFactory->__invoke($color);
	}

	public function findAllSixBricks($brickModel, $color)
	{
		$bricks = array();
		for ($i=1; $i<=6; $i++)
		{
			if ($color === null)
			{
				$brick = $this->getNewModel($brickModel->getRandomColor());
			}
			else
			{
				$brick = $this->getNewModel($color);
			}
			$bricks[] = $brick;
		}
		return $bricks;
	}

	public function findByColor($brickModel, $color)
	{
		$brickModel->setColor($color);
		return $brickModel;
	}
}
