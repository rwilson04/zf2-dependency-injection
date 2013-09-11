<?php
#module/Building/src/Building/Model/Brick.php
namespace Building\Model;

class Brick
{
	protected $_color;
	protected $_mapper;
	protected $_randomColors = array("red", "brown", "black", "yellow", 
		"orange", "purple", "green");

	public function __construct($mapper, $color)
	{
		$this->_mapper = $mapper;
		$this->_color = ($color===null)?"default":$color;
	}

	public function getMapper()
	{
		return $this->_mapper;
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


	public function getLayer($color=null)
	{
		return $this->getMapper()->findAllSixBricks($this, $color);
	}
}
