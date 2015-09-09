<?php

namespace Main\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;

class ProdutosController extends ActionController
{
    public function indexAction() 
    {
        return new ViewModel();
    }
}