<?php

namespace Building\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Building\Model\Building;
use Zend\View\Model\ViewModel;

class BuildingController extends AbstractActionController
{
	protected $building;
	protected $viewModel;
	

	public function __construct(Building $building, ViewModel $viewModel)
	{
		$this->building = $building;
		$this->viewModel = $viewModel;
		//echo "</pre>;end";
	}

	//public function setBuilding(Building\Model\Building $building)
	//{
	//	$this->building = $building
	//}

	public function getBuilding()
	{
		return $this->building;
	}

	public function getViewModel()
	{
		return $this->viewModel;
	}

	public function indexAction()
	{
		$building = $this->getBuilding();
		$building->addLayer('blue');
		$building->addLayer();
		//echo '<pre>';
		//var_dump($building->getBricks());
		//$viewModel = $this->getViewModel()->setVariables(array('building'=>$building));
		$building2 = $this->getBuilding();
		$building2->addLayer('green');
		$building2->addLayer();
		$viewModel = $this->getViewModel();
		#$viewModel = new ViewModel();
		$viewModel->setVariables(array('building'=>$building));
		return $viewModel;
	}
}
