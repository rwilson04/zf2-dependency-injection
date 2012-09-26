<?php
namespace Building\Model;

class BrickFactory 
{
	protected $brick;

	public function __construct(Brick $brick)
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
