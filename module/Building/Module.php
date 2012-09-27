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
			'shared'=>array(
				'Brick'=>false,
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
					#$brick = $sm->get('Brick');
					#$bf = new Model\BrickFactory($brick);
					#return $bf;
				#},
				'BrickPluginManager'=>function($sm)
				{
					$pluginManager = new Model\BrickFactory();
					$pluginManager->setFactory('PluginManagerBrick', function($sm){
						$brick = $sm->getServiceLocator()->get('Brick');
						return $brick;
					});
					return $pluginManager;
				},
				'Building'=>function($sm)
				{
					//$brickFactory = $sm->get('BrickFactory');
					$pluginManager = $sm->get('BrickPluginManager');
					$building = new Model\Building($pluginManager);
					return $building;
				},
			),
		);
	}

	public function getControllerConfig()
	{
		return array('factories' => array(
			'Building\Controller\Building' => function ($sm)
			{
				$building = $sm->getServiceLocator()->get('Building');
				$model = $sm->getServiceLocator()->get('Invokable\ViewModel');
				$controller = new Controller\BuildingController($building, $model);
				return $controller;
			}
		));
	}
}
