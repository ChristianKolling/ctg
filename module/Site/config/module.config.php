<?php

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/site',
                    'defaults' => array(
                        'controller' => 'Site\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'site' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/site',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Site\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                        'child_routes' => array(
                            'wildcard' => array(
                                'type' => 'Wildcard'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => [
        'invokables' => [
            'Site\Controller\Index' => 'Site\Controller\IndexController',
            'Site\Controller\Contato' => 'Site\Controller\ContatoController',
            'Site\Controller\GaleriaDeFotos' => 'Site\Controller\GaleriaDeFotosController',
            'Site\Controller\Agenda' => 'Site\Controller\AgendaController',
            'Site\Controller\Informativos' => 'Site\Controller\InformativosController',
            'Site\Controller\OCtg' => 'Site\Controller\OCtgController',
        ]
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
