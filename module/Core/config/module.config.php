<?php

return array(
    'router' => array(
        'routes' => array(
            'core' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/core',
                    'defaults' => array(
                        'controller' => 'Core\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'core' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/core',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Core\Controller',
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
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'Core\Service\EmailSender' => 'Core\Service\EmailSender',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Core\Controller\Verificacoes' => 'Core\Controller\VerificacoesController',
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);