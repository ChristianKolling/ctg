<?php

namespace Site\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;

class OCtgController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
}