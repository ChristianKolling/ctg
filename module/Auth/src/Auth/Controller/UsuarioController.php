<?php

namespace Auth\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class UsuarioController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function recuperarSenhaAction()
    {
        
    }
}
