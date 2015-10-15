<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $informativos = $this->getService('Admin\Service\Informativo')->fetchAll();
        $agenda = $this->getService('Admin\Service\Agenda')->fetchAll();
        $banners = $this->getService('Admin\Service\Banner')->fetchAll();
        
        return new ViewModel(array(
            'informativos' => $informativos,
            'agenda' => $agenda,
            'banner' => $banners
        ));
    }
}
