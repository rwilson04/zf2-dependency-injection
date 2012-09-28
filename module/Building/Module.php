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
				'Invokable\ViewModel'=>'\Zend\View\Model\ViewModel',
			),
			'factories'=>array(
				'BrickFactory'=>function($sm)
				{
					$brickFactory = new Model\BrickFactory();
					$brickFactory #->setShareByDefault(false); //set this only if you want get() to return a new instance every time for each class
								->setInvokableClass('Brick', 'Building\Model\Brick', false); #($name, $fullyQualifiedClassName, $shared=true)
					return $brickFactory;
				},
				'Building'=>function($sm)
				{
					$pluginManager = $sm->get('BrickFactory');
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
