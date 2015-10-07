<?php

namespace Site\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;

class InformativosController extends ActionController
{
    public function indexAction() 
    {
        
        return new ViewModel();
    }
    
    public function verAction()
    {
        $id = (int) $this->params()->fromRoute('id',0);
        $inf = $this->getObjectManager()->getRepository('Admin\Model\Informativo')
                ->findOneBy(array('id' => $id));
        
        return new ViewModel(array(
            'inf' => $inf
        ));
    }
}