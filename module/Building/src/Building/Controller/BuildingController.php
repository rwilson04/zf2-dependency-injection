<?php
#module/Building/src/Building/Controller/BuildingController.php

namespace Building\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BuildingController extends AbstractActionController
{
	protected $_building;
	protected $_viewFactory;
	

	public function __construct($building, $viewFactory)
	{
		$this->_building = $building;
		$this->_viewFactory = $viewFactory;
	}

	public function getBuilding()
	{
		return $this->_building;
	}

	public function getViewModel($variables = null, $options = null)
	{
		return $this->_viewFactory->__invoke($variables, $options);
	}

	public function indexAction()
	{
		$building = $this->getBuilding();
		$building->addLayer('blue');
		$building->addLayer();
		$building2 = $this->getBuilding(); //gets same instance
		$building2->addLayer('green');
		$building2->addLayer();
		$viewModel = $this->getViewModel(array('building'=>$building));
		return $viewModel;
	}
}

