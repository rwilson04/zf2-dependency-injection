<?php
namespace Building\Model;

class Brick
{
	protected $color;

	public function __construct($options = array())
	{
		if (!is_array($options))
		{
			throw new \DomainException('$options must be an array');
		}
		$this->color = (empty($options['color']))?"default":$options['color'];
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
