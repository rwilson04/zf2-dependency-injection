<?php
namespace Building;

class Module
{
	public function getAutoloaderConfig()
	{
		return array(
			'Zend\Loader\ClassMapAutoloader'=>array(
				__DIR__ . '/autoload_classmap.php',
			),
			'Zend\Loader\StandardAutoloader'=>array(
				'namespaces' => array(
					__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
				)
			)
		);
	}

	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getServiceConfig()
	{
		return array(
			'invokables'=>array(
				'Invokable\ViewModel'=>'\Zend\View\Model\ViewModel'
			),
			'factories'=>array(
				'Brick'=> function($sm)
				{
					$color = "white";
					$brick = new Model\Brick($color);
					return $brick;
				},
				#'BrickFactory'=> function($sm)
				#{
				#	$brickFactory = new Model\BrickFactory();
				#	return $brickFactory;
				#},
				'BrickFactory'=> function($sm)
				{
					$brick = $sm->get('Brick');
					$bf = new Model\BrickFactory($brick);
					return $bf;
				},
				'Building'=>function($sm)
				{
					//$brickFactory = $sm->get('AbstractBrickFactory');
					$brickFactory = $sm->get('BrickFactory');
					#$brickFactory = $sm->get('BrickFactory');
					$building = new Model\Building($brickFactory);
					return $building;
				},
			),
			#'abstractFactories'=>array(
			'abstract_factories'=>array(
				#'\Building\Model\BrickFactory',
			),
		);
	}

	public function getControllerConfig()
	{
		return array('factories' => array(
			'Building\Controller\Buildings' => function ($sm)
			{
				$building = $sm->getServiceLocator()->get('Building');
				#$model = $sm->get('Service\ViewModel');
				#$model = $sm->getServiceLocator()->get('Factory\ViewModel');
				$model = $sm->getServiceLocator()->get('Invokable\ViewModel');
				#$model = $sm->getServiceLocator()->get('ViewModel');
				//$viewModel = new ViewModel(array('key'=>'value'));
				$controller = new Controller\BuildingController($building, $model);
				return $controller;
			}
		));
	}
}
