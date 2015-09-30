<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $informativos = $this->getService('Admin\Service\Informativo')->fetchAll();
        
        return new ViewModel(array(
            'informativos' => $informativos
        ));
    }
}
