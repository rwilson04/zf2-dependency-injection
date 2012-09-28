<?php

namespace Building\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Building\Model\Building;
use Building\Model\ViewFactory;

class BuildingController extends AbstractActionController
{
	protected $building;
	protected $viewFactory;
	

	public function __construct(Building $building, ViewFactory $viewFactory)
	{
		$this->building = $building;
		$this->viewFactory = $viewFactory;
	}

	public function getBuilding()
	{
		return $this->building;
	}

	public function getViewFactory()
	{
		return $this->viewFactory;
	}

	public function indexAction()
	{
		$building = $this->getBuilding();
		$building->addLayer('blue');
		$building->addLayer();
		$building2 = $this->getBuilding(); //gets same instance
		$building2->addLayer('green');
		$building2->addLayer();
		$viewModel = $this->getViewFactory()->get('ViewModel', array('building'=>$building));
		return $viewModel;
	}
}
