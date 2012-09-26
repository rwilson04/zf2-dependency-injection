<?php
return array(
	'controllers'=>array(
		//'invokables'=>array(
			//'BrickFactory'=>'Building\Model\BrickFactory'
		//)
	),
    'router' => array(
        'routes' => array(
            'building' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/building[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Building\Controller\Buildings',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'building' => __DIR__ . '/../view',
        ),
    ),
);
return array(
	'controllers'=>array(
		//'invokables'=>array(
			//'BrickFactory'=>'Building\Model\BrickFactory'
		//)
	),
    'router' => array(
        'routes' => array(
            'building' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/building[/:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Building\Controller\Buildings',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'building' => __DIR__ . '/../view',
        ),
    ),
);
