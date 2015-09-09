<?php

namespace App\Controller;

use Core\Controller\ActionController as ActionController;
use Zend\View\Model\ViewModel;
use App\Form\Login as LoginForm;
use App\Form\EsqueceuSuaSenha as EsqueceuSuaSenhaForm;

class IndexController extends ActionController
{
    public function indexAction()
    {   
        $form = new LoginForm();
        if($this->getRequest()->isPost()){
            $this->redirect()->toUrl('/main');
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function esqueceuSuaSenhaAction()
    {
        $form = new EsqueceuSuaSenhaForm();
        
        return new ViewModel(array(
            'form' => $form
        ));
    }
}
