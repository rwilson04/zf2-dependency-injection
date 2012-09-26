<?php
namespace Building\Model;

class Building
{
	protected $brickFactory;
	protected $bricks;

	public function __construct(BrickFactory $brickFactory)
	{
		$this->brickFactory = $brickFactory;
	}

	public function getNewBrick($color)
	{
		$factory = $this->brickFactory;
		$brick = $factory->createBrick($color);
		$brick->setColor($color);
		return $brick;
	}

	public function addLayer($color=null)
	{
		$colors = array("red", "brown", "black", "yellow");
		$layer = array();
		for ($i=0; $i<6; $i++)
		{
			if ($color === null)
			{
				$randomColor = $colors[array_rand($colors)];
				$brick = $this->brickFactory->createBrick($randomColor);
			}
			else
			{
				$brick = $this->brickFactory->createBrick($color);
			}
			$layer[] = $brick;
		}
		$this->bricks[]=$layer;
	}

	public function getBricks()
	{
		return $this->bricks;
	}

}
