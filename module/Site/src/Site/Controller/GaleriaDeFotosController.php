<?php

namespace Site\Controller;

use Zend\View\Model\ViewModel;
use Core\Controller\ActionController;

class GaleriaDeFotosController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
