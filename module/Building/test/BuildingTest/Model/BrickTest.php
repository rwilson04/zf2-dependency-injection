<?php
namespace BuildingTest\Model;

use PairWise\TestCase;
use Building\Model\Brick;

class BrickModelTest extends TestCase
{

	public function testGetSet()
	{
		$brick = new Brick();
		$brick->setColor("green");
		$color = $brick->getColor();
		$this->assertSame($color, "green");

	}

}
