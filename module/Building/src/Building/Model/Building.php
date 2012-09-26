<?php
namespace Building\Model;

class Building
{
	protected $brickFactory;
	protected $bricks;
	#protected $brick;

	public function __construct(BrickFactory $brickFactory)
	//public function __construct(\Closure $brickFactory)
	#public function __construct(Brick $brick)
	{
		$this->brickFactory = $brickFactory;
		#$this->brick = function() { return $brick; };
	}

	#public function setBrick(Brick $brick)
	#{
		#$this->brick = $brick;
	#}

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
		for ($i=0; $i<10; $i++)
		{
			if ($color === null)
			{
				//$brick = $this->brickFactory->createBrick($colors[array_rand($colors)]);
				$randomColor = $colors[array_rand($colors)];
				//echo "adding $randomColor brick <br >";
				$brick = $this->getNewBrick($randomColor);
			}
			else
			{
				$brick = $this->getNewBrick($color);
				#$brick = $this->brickFactory->createBrick($color);
			}
			$this->addBrick($brick);
		}
	}

	public function getBricks()
	{
		return $this->bricks;
	}

	private function addBrick(Brick $brick)
	{
		$this->bricks[] = $brick;
	}
}
