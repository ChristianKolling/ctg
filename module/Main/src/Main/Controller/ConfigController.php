<?php

namespace Main\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

use Main\Form\Usuario as FormUsuario;

class ConfigController extends ActionController 
{
    public function indexAction() 
    {   
        $form = new FormUsuario();
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
