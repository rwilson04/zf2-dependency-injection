<?php
namespace BuildingTest\Model;

use PairWise\TestCase;
use PairWise\Mock;
use PairWise\Unit;
use Building\Model\Brick;
use Building\Model\Building;

class BuildingModelTest extends TestCase
{
	public function testAddLayer()
	{
		echo "\n\ntestAddLayer\\n\n";
		$factory = function ($color=null) {
			$brick = new Mock('\Building\Model\Brick', 'blue');
			$brick->shouldReceive('getColor')->andReturn('blue');
			$brick->shouldReceive('tetColor')->andReturn('blue');
			return $brick;
		};
		$building = new Unit('\Building\Model\Building', $factory);
		$building->addLayer("blue");
		$bricks = $building->getBricks();
		$layer = array_shift($bricks);
		$brick = array_shift($layer);
		$brick->testPair();
		$color = $brick->tetColor();
		$color = $brick->getColor();
		$building->testPair();
		$this->assertSame($color, "blue");
	}

	public function testTest()
	{
		//print_r(get_class_methods($this));
	}

}
