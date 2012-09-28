<?php
namespace Building\Model;

class Building
{
	protected $brickFactory;
	protected $bricks;
	protected $colors = array("red", "brown", "black", "yellow", "orange", "purple", "green");

	public function __construct(BrickFactory $brickFactory)
	{
		$this->brickFactory = $brickFactory;
	}

	public function getNewBrick($color)
	{
		$factory = $this->brickFactory;
		$brick = $factory->get('Brick', array('color'=>$color));
		return $brick;
	}

	public function addLayer($color=null)
	{
		$layer = array();
		for ($i=0; $i<6; $i++)
		{
			$newBrickColor = ($color === null)?$this->colors[array_rand($this->colors)]:$color;
			$brick = $this->getNewBrick($newBrickColor);
			$layer[] = $brick;
		}
		$this->bricks[]=$layer;
	}

	public function getBricks()
	{
		return $this->bricks;
	}

}
