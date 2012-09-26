<?php
namespace Building\Model;

class Brick
{
	protected $color;

	public function __construct($color)
	{
		$this->color = $color;
	}

	public function setColor($color)
	{
		$this->color = $color;
	}

	public function getColor()
	{
		return $this->color;
	}
}
