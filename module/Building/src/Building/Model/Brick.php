<?php
#module/Building/src/Building/Model/Brick.php
namespace Building\Model;

class Brick
{
	protected $_color;
	protected $_randomColors = array("red", "brown", "black", "yellow", 
		"orange", "purple", "green");

	public function __construct($color = null)
	{
		$this->_color = ($color===null)?"default":$color;
	}

	public function setColor($color)
	{
		$this->_color = $color;
	}

	public function getColor()
	{
		return $this->_color;
	}

	public function getRandomColor()
	{
		return $this->_randomColors[array_rand($this->_randomColors)];
	}
}
