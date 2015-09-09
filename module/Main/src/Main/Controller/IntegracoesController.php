<?php

namespace Main\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

class IntegracoesController extends ActionController
{
    public function indexAction() 
    {
        return new ViewModel();
    }
    
    public function novaAction() 
    {
        return new ViewModel();
    }
}
