<?php
return array(
    'controllers' => [
        'invokables' => [
            'Site\Controller\Index' => 'Site\Controller\IndexController'
        ]
    ],
    'router' => array(
        'routes' => array(
            'site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/site',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);