<?php

namespace Admin\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class BannersController extends ActionController
{
    public function indexAction() 
    {
        return new ViewModel();
    }
}
