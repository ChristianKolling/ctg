<?php

return array(
    'module_layouts' => array(
        'Site' => 'site/layout/layout',
        'Admin' => 'admin/layout/layout',
        'Auth' => 'auth/layout/layout'
    ),
    'acl' => array(
        'roles' => array(
            'visitante' => null,
            'adm' => 'visitante'
        ),
        'resources' => array(
            'Site\Controller\Index.index',
            'Site\Controller\Agenda.index',
            'Site\Controller\Contato.index',
            'Site\Controller\GaleriaDeFotos.index',
            'Site\Controller\Informativos.index',
            'Site\Controller\Informativos.ver',
            'Site\Controller\OCtg.index',
            'Auth\Controller\Index.index',
            'Admin\Controller\Index.index',
            'Admin\Controller\Agenda.index',
            'Admin\Controller\Agenda.novo',
            'Admin\Controller\Agenda.editar',
            'Admin\Controller\Agenda.deletar',
            'Admin\Controller\Banners.index',
            'Admin\Controller\Banners.novo',
            'Admin\Controller\Banners.editar',
            'Admin\Controller\Banners.deletar',
            'Admin\Controller\Informativos.index',
            'Admin\Controller\Informativos.novo',
            'Admin\Controller\Informativos.editar',
            'Admin\Controller\Informativos.deletar',
        ),
        'privilege' => array(
            'visitante' => array(
                'allow' => array(
                    'Site\Controller\Index.index',
                    'Site\Controller\Agenda.index',
                    'Site\Controller\Contato.index',
                    'Site\Controller\GaleriaDeFotos.index',
                    'Site\Controller\Informativos.index',
                    'Site\Controller\Informativos.ver',
                    'Site\Controller\OCtg.index',
                    'Auth\Controller\Index.index',
                )
            ),
            'adm' => array(
                'allow' => array(
                    'Admin\Controller\Index.index',
                    'Admin\Controller\Agenda.index',
                    'Admin\Controller\Agenda.novo',
                    'Admin\Controller\Agenda.editar',
                    'Admin\Controller\Agenda.deletar',
                    'Admin\Controller\Banners.index',
                    'Admin\Controller\Banners.novo',
                    'Admin\Controller\Banners.editar',
                    'Admin\Controller\Banners.deletar',
                    'Admin\Controller\Informativos.index',
                    'Admin\Controller\Informativos.novo',
                    'Admin\Controller\Informativos.editar',
                    'Admin\Controller\Informativos.deletar',
                )
            ),
        )
    )
);
