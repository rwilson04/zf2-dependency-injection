<?php
#module/Building/config/module.config.php
return array(
    'router' => array(
        'routes' => array(
            'building' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/building[/[:action]]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'Building\Controller\Building',
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
