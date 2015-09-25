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
}